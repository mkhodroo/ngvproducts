<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = new CartController();
        return view('store.checkout.checkout')->with([
            'items' => $cart->get_user_cart_items()
        ]);
    }
}
