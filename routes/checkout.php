<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('/checkout')->group(function(){
    Route::any('', [CheckoutController::class, 'index'])->name('checkout');
    Route::any('/pay', [CheckoutController::class, 'pay'])->name('pay');
});