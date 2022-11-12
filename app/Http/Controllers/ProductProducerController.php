<?php

namespace App\Http\Controllers;

use App\Models\ProductPrice;
use App\Models\ProductProducer;
use Illuminate\Http\Request;

class ProductProducerController extends Controller
{
    public function add($p_id, $name)
    {
        $product_producer = ProductProducer::create([
            'product_id' => $p_id,
            'name' => $name
        ]);
        return $product_producer;
    }

    public function edit(Request $r)
    {
        $price = new ProductPriceController();
        for($i=0; $i >= 0; $i++){
            $input_id = "list-id_$i";
            $input_name = "list-name_$i";
            $input_price = "list-price_$i";

            if( $r->get($input_name) == null ){
                break;
            }
            
            if($r->$input_id !== null){
                $producer = $this->get($r->$input_id);
                $producer->name = $r->$input_name;
                $producer->save();
            }else{
                $producer = $this->add($r->product_id, $r->$input_name);
            }
            
            $price->add($r->product_id, $r->$input_price, $producer->id);
        }
        return response('قیمت برای تولیدکنندگان ذخیره شد');
    }

    public function get($id)
    {
        $pp = ProductProducer::find($id);
        $pp->price = $pp->price();
        return $pp;
    }

    public function get_user_product_producers_id()
    {
        $products_id = (new ProductController())->get_user_products_id();
        return ProductProducer::where('product_id', 1)->get()->pluck('id')->values();
    }
}
