<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->middleware(['guest'])->group(function(){
    Route::prefix('/products')->group(function(){
        Route::any('', [ProductController::class, 'list'])->name('admin-products');
        Route::any('/add', [ProductController::class, 'add'])->name('add-product');
    });
});