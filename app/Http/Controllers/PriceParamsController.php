<?php

namespace App\Http\Controllers;

use App\Models\PriceParams;
use Illuminate\Http\Request;

class PriceParamsController extends Controller
{
    public static function get_all()
    {
        return PriceParams::get();
    }
    
    public function get_with_key($key)
    {
        return PriceParams::where('key', $key)->first();
    }

    public static function get_string_between($string, $start = '{', $end = '}'){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
}
