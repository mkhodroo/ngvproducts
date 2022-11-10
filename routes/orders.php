<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('/orders')->group(function(){
    Route::any('', [OrderController::class, 'orders'])->name('admin-orders');
    Route::any('get/{order_code}', [OrderController::class, 'get_order_info_by_order_code'])->name('admin-get-order-info');
    Route::post('save-order-store', [OrderController::class, 'save_order_store'])->name('admin-save-order-store');
});