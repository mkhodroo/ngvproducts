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
        return ProductsInventory::whereIn('store_id', $user_store_ids)->get();
    }

    public function add(Request $r)
    {
        ProductsInventory::create([
            'product_id' => $r->product_id,
            'store_id' => $r->store_id,
            'number' => $r->number
        ]);
        return response('اضافه شد');
    }

    
}
