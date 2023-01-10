<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SimpleXLSX;
use App\Models\PriceParams;
use App\Models\ProductPrice;
use App\Models\ProductProducer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use ParseError;
use Throwable;

use function PHPSTORM_META\type;

class ProductPriceController extends Controller
{
    public function add($product_id, $price, $producer_id=null)
    {
        $pp =ProductPrice::create([
            'product_id' => $product_id,
            'price' => $price,
            'product_producer_id' => $producer_id
        ]);
        return $pp->id;
    }

    public function add_with_request(Request $r)
    {
        if(!$r->price){
            return ProductPrice::where('product_producer_id', $r->product_producer_id)->first();
        }
        $pp =ProductPrice::create($r->all());
        $pp->product_id = ProductProducer::find($r->product_producer_id)->product_id;
        $pp->save();
        return $pp;
    }

    public function update_price(Request $r)
    {
        $p = $this->get($r->product_producer_id);
        if($p){
            $p->update($r->all());
        }
        return $p;
    }

    public function get($producer_id)
    {
        return ProductPrice::producer_prices($producer_id);
    }

    public function add_with_file(Request $r)
    {
        $file = $r->file('file');
        $file_path = public_path('products/prices');
        $file->move($file_path,'prices.xlsx');

        $xlsx = SimpleXLSX::parse("$file_path/prices.xlsx");
        $i=1;
        $er = "";
        foreach($xlsx->rows() as $row){
            if($i !=1){
                try{
                    ProductPrice::create([
                        'product_id' => $row[0],
                        'product_producer_id' => $row[2],
                        'price' => $row[6],
                        'agency_price' => $row[7],
                        'min_agency_number' => $row[8],
                        'wholesaler_price' => $row[9],
                        'min_wholesaler_number' => $row[10]
                    ]);
                }
                catch(Exception $e){
                    $er .= "row #$i: $e->getMessage()";
                }
            }
            $i++;
        }

        return response($er);
    }

    public static function cal_price(ProductPrice $price)
    {
        // Log::info("price: ". $price);
        $price->showing_price = $price?->price;
        $price->min_number = 1;
        $user = Auth::user();
        if($user){
            if($user->role_id == 2){ // PRICE FOR AGENCIES
                $price->showing_price = $price?->agency_price;
                $price->min_number = $price->min_agency_number;
            }
            elseif($user->role_id == 3){ // PRICE FOR WHOLESALER
                $price->showing_price = $price?->wholesaler_price;
                $price->min_number = $price->min_wholesaler_number;
            }
        }
        // Log::info("user role id : ".Auth::user()?->role_id);
        $price_is_number = true;
        for ($i = 0; $i < strlen($price->showing_price); $i++){
            $char = $price->showing_price[$i];
            if (is_numeric($char)) {
               continue;
            } else {
                $price_is_number = false;
               break;
            }
        }
        
        if($price_is_number){
            return $price;
        }

        foreach(PriceParamsController::get_all() as $param){
            $price->showing_price = str_replace($param->key, $param->value, $price->showing_price);
        }
        try{
            eval( '$result = (' . $price->showing_price. ');' );
            $price->showing_price = $result;
            // Log::info($price->only('showing_price', 'min_number'));
            return $price;
        }
        catch(Throwable $e){
            $price->showing_price = "پارامتری";
            $price->min_number = 0;
            return $price;
        }
        
    }
}
