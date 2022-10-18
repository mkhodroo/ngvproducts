<?php

namespace App\Http\Controllers;

use App\Models\ProductPrice;
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
}
