<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function get_product_orders_number($product_id)
    {
        return Order::where('product_producer_id', $product_id)->sum('number');
    }
}
