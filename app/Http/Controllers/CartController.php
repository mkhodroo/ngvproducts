<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $r)
    {
        if(!Auth::id()){
            return response('ابتدا وارد شوید', 403);
        }
        $user_cart = $this->product_is_in_user_cart($r->pp_id);
        if( $user_cart ){
            $user_cart->number = $user_cart->number +1;
            $user_cart->save();
            return $user_cart;
        }
        return Cart::create([
            'product_producer_id' => $r->pp_id,
            'number' => 1,
            'user_id' => Auth::id(),
        ]);
    }

    public function product_is_in_user_cart($pp_id)
    {
        return Cart::where([
            'product_producer_id' => $pp_id,
            'user_id' => Auth::id()
        ])->first();
    }
    
    public function get_user_cart_items()
    {
        return Cart::where('user_id', Auth::id())->get()->each(function($c){
            $c->producer = $c->producer();
            $c->product = $c->product();
            $c->price = $c->producer()->price();
        });
    }

    public function get_total_price()
    {
        $total = 0 ;
        $items = $this->get_user_cart_items();
        foreach($items as $item){
            $total = $total + ($item->price->price * $item->number);
        }
        return $total;
    }

    public function delete_user_cart_items()
    {
        Cart::where('user_id', Auth::id())->delete();
    }
}