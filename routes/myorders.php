<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('/myorders')->group(function(){
    Route::any('', [OrderController::class, 'my_orders'])->name('my-orders');
    Route::any('/pay', [CheckoutController::class, 'pay'])->name('pay');
});