<?php

namespace App\Http\Controllers;

use App\Models\ProductPrice;
use App\Models\ProductProducer;
use Illuminate\Http\Request;

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
        $product_image_path = public_path('products/prices');
        $file->move($product_image_path,'prices.xlsx');



        return response('asd');
    }
}
