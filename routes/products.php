<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('/products')->group(function(){
    Route::any('', [ProductController::class, 'list'])->name('admin-products');
    Route::any('/get-list', [ProductController::class, 'get_list'])->name('admin-products-get-list');
    Route::any('/add', [ProductController::class, 'add'])->name('add-product');
});