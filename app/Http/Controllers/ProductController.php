<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct() {
        
    }

    public function list()
    {
        return view('admin.products.list');
    }

    public function add(Request $r)
    {
        AccessController::check('add_product');
        Product::create([
            'name' => $r->name
        ]);
        return response('اضافه شد');
    }
}
