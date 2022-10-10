<?php

namespace App\Http\Controllers;

use App\Models\ProductPrice;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    public function add($product_id, $price)
    {
        $pp =ProductPrice::create([
            'product_id' => $product_id,
            'price' => $price
        ]);
        return $pp->id;
    }
}
