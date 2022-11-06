<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function add($key, $value = null)
    {
        return Option::create([
            'key' => $key, 
            'value' => $value
        ]);
    }

    public function edit($key,$value = null)
    {
        $o = $this->get_by_key($key);
        $o->value = $value;
        $o->save();
        return $o;
    }

    public function get_by_key($key)
    {
        return Option::where('key', $key)->first();
    }

}
