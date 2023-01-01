<?php

namespace App\Http\Controllers;

use App\Models\ProducerFeature;
use Illuminate\Http\Request;

class ProducerFeatureController extends Controller
{
    public function add_with_request(Request $r)
    {
        if(!$r->key){
            return response("",300);
        }
        $pp =ProducerFeature::create($r->all());
        return $pp;
    }

    public function get($producer_id)
    {
        return ProducerFeature::where('producer_id', $producer_id)->get();
    }
}
