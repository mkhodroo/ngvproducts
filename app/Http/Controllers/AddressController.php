<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function customer_addresses()
    {
        return CustomerAddress::where('user_id', Auth::id())->get();
    }
}
