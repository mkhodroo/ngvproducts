<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductsInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductInventoryController extends Controller
{
    private $model; 
    private $productCont;
    private $storeCont;

    public function __construct() {
        $this->productCont = new ProductController();
        $this->storeCont = new StoreController();
    }

    public function list()
    {
        return view('admin.inventory.list')->with([
            'products' => $this->productCont->get_user_products(),
            'stores' => $this->storeCont->get_user_stores(),
        ]);
    }

    public function get_user_inventories()
    {
        $user_store_ids = $this->storeCont->get_user_stores_ids();
        return ProductsInventory::whereIn('store_id', $user_store_ids)
                ->get()
                ->each(function($c){
                    $c->product_name = $c->producer()->product()->name;
                    $c->producer_name = $c->producer()->name;
                    $c->store_name = $c->store()->name;
                });
    }

    public function add(Request $r)
    {
        ProductsInventory::create([
            'product_producer_id' => $r->pp_id,
            'store_id' => $r->store_id,
            'number' => $r->number
        ]);
        return response('اضافه شد');
    }

    public function get_product_inventory($pp_id)
    {
        return ProductsInventory::where('product_producer_id', $pp_id)->sum('number');
    }

    public function cal_product_inventory($product_id)
    {
        $inventory = $this->get_product_inventory($product_id);
        $product_orders_number = OrderController::get_product_orders_number($product_id);
        return $inventory - $product_orders_number;
    }

    
}
