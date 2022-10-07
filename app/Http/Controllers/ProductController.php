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
        // AccessController::check('add_product');
        Product::create([
            'name' => $r->name,
            'user_id' => Auth::id()
        ]);
        return response('اضافه شد');
    }

    public function get_user_products()
    {
        $pInventoryCont = new ProductInventoryController();
        return Product::where('user_id', Auth::id())->get()->each(function($c)use($pInventoryCont){
            $c->inventory = $pInventoryCont->cal_product_inventory($c->id);
        });
    }

    public function get(Request $r=null, $id=null)
    {
        if($id){
            return Product::find($id);
        }
        if($r->id){
            return Product::find($r->id);
        }
    }

    public function get_user_product($product_id, $user_id)
    {
        return Product::where('id', $product_id)->where('user_id', $user_id)->first();
    }

    public function edit(Request $r)
    {
        $this->get_user_product($r->id, Auth::id())->update([
            'name' => $r->name
        ]);
        return response('محصول ویرایش شد.');
    }
}
