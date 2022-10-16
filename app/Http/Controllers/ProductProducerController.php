<?php

namespace App\Http\Controllers;

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
        return $product_producer->id;
    }
}
