<?php

namespace App\Http\Controllers;

use App\Models\ProductPrice;
use App\Models\ProductProducer;
use Illuminate\Http\Request;

class ProductProducerController extends Controller
{
    public function add($p_id, $name, $seller_name = null)
    {
        if(!$seller_name){
            $seller_name = $name;
        }
        $product_producer = ProductProducer::create([
            'product_id' => $p_id,
            'name' => $name,
            'seller_name' => $seller_name
        ]);
        return $product_producer;
    }

    public function edit(Request $r)
    {
        $price = new ProductPriceController();
        for($i=0; $i >= 0; $i++){
            $input_id = "list-id_$i";
            $input_name = "list-name_$i";
            $input_seller_name = "list-seller-name_$i";

            if( $r->get($input_name) == null ){
                break;
            }
            
            if($r->$input_id !== null){
                $producer = $this->get($r->$input_id);
                $producer->update([
                    'name' => $r->$input_name,
                    'seller_name' => $r->$input_seller_name
                ]);
            }else{
                $producer = $this->add($r->product_id, $r->$input_name, $r->$input_seller_name);
            }
            // $price->add($r->product_id, $r->$input_price, $producer->id);
        }
        return response('قیمت برای تولیدکنندگان ذخیره شد');
    }

    public function get($id)
    {
        $pp = ProductProducer::find($id);
        return $pp;
    }

    public function get_details($id)
    {
        $pp = ProductProducer::find($id);
        $pp->price = $pp->price();
        $pp->features = $pp->features();
        return $pp;
    }

    public function get_user_product_producers_id()
    {
        $products_id = (new ProductController())->get_user_products_id();
        return ProductProducer::whereIn('product_id', $products_id)->get()->pluck('id')->values();
    }

    public function get_producer_products_by_pro_name($name)
    {
        
    }

    public function show_list()
    {
        return view('admin.price.list');
    }

    public function get_prices_data()
    {
        return [
            'data' => ProductProducer::get()->each(function($c){
                $c->product = $c->product();
                $c->price = $c->price();
                $c->producer_seller = $c->name . "-" . $c->seller_name;
            })
        ];
    }
}
