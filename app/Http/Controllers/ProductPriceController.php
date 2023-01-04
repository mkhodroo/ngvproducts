<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SimpleXLSX;
use App\Models\PriceParams;
use App\Models\ProductPrice;
use App\Models\ProductProducer;
use Exception;
use Illuminate\Http\Request;
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
                        'price' => $row[4],
                        'agency_price' => $row[5],
                        'min_agency_number' => $row[6],
                        'wholesaler_price' => $row[7],
                        'min_wholesaler_number' => $row[8]
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

    public static function cal_price($price)
    {
        // Log::info($price);
        $price_is_number = true;
        for ($i = 0; $i < strlen($price); $i++){
            $char = $price[$i];
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
            $price = str_replace($param->key, $param->value, $price);
        }
        try{
            eval( '$result = (' . $price. ');' );
            return $result;
        }
        catch(Throwable $e){
            return 'پارامتری';
        }
        
    }
}
