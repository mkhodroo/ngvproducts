<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct() {
        
    }

    public function list()
    {
        return view('admin.products.list');
    }

    public function get_list()
    {
        $ar = array( 'data' => Product::get());
        return $ar;
    }

    public function add(Request $r)
    {
        AccessController::check('add_product');
        Product::create([
            'name' => $r->name
        ]);
        return response('اضافه شد');
    }

    public function get_user_products()
    {
        return Product::where('user_id', Auth::id())->get();
    }
}
