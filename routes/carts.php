<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('/carts')->group(function(){
    Route::any('/get', [CartController::class, 'get_user_cart_items'])->name('get-user-cart-items');
    Route::any('/get-total-price', [CartController::class, 'get_total_price'])->name('get-total-price');
    Route::any('/add', [CartController::class, 'add'])->name('add-to-cart');
    Route::any('/delete', [CartController::class, 'delete'])->name('delete-cart-item');
    
});