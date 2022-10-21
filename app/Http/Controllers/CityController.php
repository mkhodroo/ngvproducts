<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function provinces()
    {
        return City::groupBy('province')->select('province')->get();
    }

    public function cities()
    {
        return City::get();
    }
}
