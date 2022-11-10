<?php

namespace App\Http\Controllers;

use App\Enums\enums;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public static function get_product_orders_number($product_id)
    {
        return Order::where('product_producer_id', $product_id)->sum('number');
    }

    public function my_orders()
    {
        if(!Auth::id()){
            return abort('ابتدا وارد شوید', 403);
        }
        return view('store.my-orders.list')->with([
            'order_codes' => $this->get_orders_groupBy_order_code(),
            'orders' => $this->get_orders_by_user_id()
        ]);
    }

    public function get_orders_groupBy_order_code()
    {
        return Order::where('user_id', Auth::id())->select('order_code')->groupBy('order_code')->get();
    }

    public function get_orders_by_user_id()
    {
        return Order::where('user_id', Auth::id())->get();
    }



    public function orders()
    {
        $user_product_producers_id = (new ProductProducerController())->get_user_product_producers_id();
        return view('admin.orders.list')->with([
            'orders_code' => $this->get_orders_code($user_product_producers_id),
            'stores' => (new StoreController())->get_user_stores(),
        ]);
    }

    public function get_orders_code($user_product_producers_id)
    {
        return Order::whereIn('product_producer_id', $user_product_producers_id)
            ->groupBy('order_code')
            ->get()->each(function($c){
                $c->how_to_send = enums::how_to_send[$c->how_to_send];
                $c->payment_status = enums::payment_status[$c->payment_status];
            });
    }

    public function get_order_info_by_order_code($order_code)
    {
        return Order::where('order_code', $order_code)->get()->each(function($c){
            $c->product_name = $c->producer()->product()->name;
            $c->producer_name = $c->producer()->name;
            $c->store = $c->store();
        });
    }

    public function save_order_store(Request $r)
    {
        $o = Order::find($r->order_id);
        $o->store_id = $r->store_id;
        $o->save();
        $product_inventory = new ProductInventoryController();
        $des = "for order id: $o->id";
        $product_inventory->insert_order_record($o->product_producer_id, $o->store_id, $des, -$o->number);
        return $o;
    }
}
