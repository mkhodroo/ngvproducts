<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCatagory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function find(Request $r)
    {
        $ar = [];
        $s = $this->search_in_product_name($r->q);
        foreach($s as $s){
            $ar[] = $s;
        }
        if( count($ar) == 4 ){
            return $ar;
        }
        $s = $this->search_in_catagory($r->q);
        foreach($s as $s){
            $ar[] = $s;
        }
        return $ar;
    }

    public function search_in_product_name($str)
    {
        return Product::select('id','name')->where('name', 'like', "%$str%")->take(4)->get()->each(function($c){
            $c->name = "محصول: $c->name";
            $c->link = route('product-show', ['id' => $c->id]);
        })->toArray();
    }

    public function search_in_catagory($str)
    {
        return ProductCatagory::select('id','name')->where('name', 'like', "%$str%")->take(3)->get()->each(function($c){
            $c->link = route('show-catagory-by-name', ['name' => $c->name]);
            $c->name = "دسته بندی: $c->name";
        });
    }
}
