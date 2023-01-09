<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;
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
            'total_price' => $cart->get_total_price(),
            'cities' => $city->cities(),
            'customer_addresses' => $c_address->customer_addresses(),
        ]);
    }

    public function pay(Request $r )
    {
        $carts = new CartController();
        $order_code = $this->create_new_order_code();
        foreach($carts->get_user_cart_items() as $item){
            $order = Order::create([
                'order_code' => $order_code,
                'product_producer_id' => $item->producer()->id,
                'price' => $item->price()->showing_price,
                'number' => $item->number,
                'user_id' => Auth::id(),
                'how_to_send' => $r->how_to_send,
                'customer_address_id' => $r->address,
                'payment_status' => $r->payment_status,
            ]);
        }
        $this->increase_last_order_number();
        $carts->delete_user_cart_items();
        return response("سفارش شما با کد پیگیری $order_code ثبت شد. و در حال پردازش می باشد");
    }

    public function create_new_order_code()
    {
        $o = new OptionController();
        $last_order_code = $o->get_by_key('last_order_number');
        if(!$last_order_code){
            $last_order_code = $o->add('last_order_number', 0);
        }
        $d = Carbon::now();
        return $d->format('Y'). $d->format('m') . $d->format('d') . $last_order_code->value + 1;

    }

    public function increase_last_order_number()
    {
        $o = new OptionController();
        $loc = $o->get_by_key('last_order_number');
        $o->edit($loc->key, $loc->value+1);
    }
}
