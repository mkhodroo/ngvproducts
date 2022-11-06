<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = new CartController();
        $city = new CityController();
        $c_address = new AddressController();
        return view('store.checkout.checkout')->with([
            'items' => $cart->get_user_cart_items(),
            'cities' => $city->cities(),
            'customer_addresses' => $c_address->customer_addresses(),
        ]);
    }

    public function pay(Request $r )
    {
        $carts = (new CartController())->get_user_cart_items();
        foreach($carts as $item){
            $order = Order::create([
                'order_code' => '100001',
                'product_producer_id' => $item->producer()->id,
                'price' => $item->price()->price,
                'number' => $item->number,
                'user_id' => Auth::id(),
                'how_to_send' => $r->how_to_send,
                'customer_address_id' => $r->address,
                'payment_status' => $r->payment_status,
            ]);
        }
        return response('ثبت شد');
    }
}
