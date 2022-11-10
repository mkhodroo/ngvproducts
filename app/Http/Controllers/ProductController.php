<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductProducer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $p = Product::create([
            'name' => $r->name,
            'user_id' => Auth::id()
        ]);
        return response($p);
    }

    public function get_user_products()
    {
        $pInventoryCont = new ProductInventoryController();
        return Product::where('user_id', Auth::id())->get()->each(function($c)use($pInventoryCont){
            $c->inventory = $pInventoryCont->get_product_inventory($c->id);
        });
    }

    public function get_user_products_id()
    {
        return Product::where('user_id', Auth::id())->get()->pluck('id')->values();
    }

    public function get(Request $r=null, $id=null)
    {
        if($id){
            $p = Product::find($id);
            $p->images = $p->images();
            $p->producers = $p->producers()->each(function($c){
                $c->price = $c->price();
            });
            return $p;
        }
        if($r->id){
            $p = Product::find($r->id);
            $p->images = $p->images();
            $p->producers = $p->producers()->each(function($c){
                $c->price = $c->price();
            });
            return $p;
        }
    }

    public function get_user_product($product_id, $user_id)
    {
        return Product::where('id', $product_id)->where('user_id', $user_id)->first();
    }

    public function edit(Request $r)
    {
        $this->get_user_product($r->id, Auth::id())->update([
            'name' => $r->name,
        ]);
        $product_price = new ProductPriceController();
        $product_price->add($r->id, $r->price);

        return response('محصول ویرایش شد.');
    }

    public function newest_products()
    {
        return Product::orderBy('id', 'desc')->take(4)->get()->each(function($c){
            $c->price = $c->min_price()?->price;
        });
    }
}
