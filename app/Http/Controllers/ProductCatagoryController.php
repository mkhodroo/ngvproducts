<?php

namespace App\Http\Controllers;

use App\Models\ProductCatagory;
use Illuminate\Http\Request;

class ProductCatagoryController extends Controller
{
    public function list()
    {
        return view('admin.product-catagories.list');
    }

    public function get_catagories()
    {
        return ProductCatagory::get();
    }

    public function add(Request $r)
    {
        return ProductCatagory::create([
            'name' => $r->name,
        ]);
    }

    public function get($id)
    {
        return ProductCatagory::find($id);
    }

    public function get_by_name($name)
    {
        return ProductCatagory::where('name', $name)->first();
    }

    public function get_by_part_of_name($name)
    {
        return ProductCatagory::where('name', 'like', "%$name%")->get()->pluck('id')->values();
    }

    public function edit(Request $r)
    {
        $c = $this->get($r->id);
        $c->name = $r->name;
        $c->save();
        return $c;
    }

    public function show_by_name($name)
    {
        
    }
}
