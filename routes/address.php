<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('/address')->group(function(){
    Route::any('add', [AddressController::class, 'add'])->name('add-address');
});