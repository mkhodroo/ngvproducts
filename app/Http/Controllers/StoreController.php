<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function list()
    {
        return view('admin.stores.list')->with([
            'cities' => City::get(),
        ]);
    }

    public function get_user_stores($user_id = null)
    {
        if (!$user_id)
            $user_id = Auth::id();
        return Store::where('user_id', $user_id)->get()->each(function($c){
            $c->city = $c->city();
        });
    }

    public function get_user_stores_ids($user_id = null)
    {
        if (!$user_id)
            $user_id = Auth::id();
        $store = Store::where('user_id', $user_id)->select('id')->get();
        $ar = [];
        foreach($store as $s){
            $ar[] = $s->id;
        }
        return $ar;
    }

    public function add(Request $r)
    {
        Store::create([
            'name' => $r->name,
            'user_id' => Auth::id(),
            'city_id' => $r->city_id,
            'address' => $r->address,
        ]);
        return response('اضافه شد');
    }
}
