<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products = new ProductController();
        return view('store.home.home')->with([
            'newest_products' =>  $products->newest_products(),
        ]);
    }
}
