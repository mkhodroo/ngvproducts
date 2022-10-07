<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('/products')->group(function(){
    Route::any('', [ProductController::class, 'list'])->name('admin-products');
    Route::any('/edit', [ProductController::class, 'edit'])->name('admin-edit-product');
    Route::any('/get/{id}', [ProductController::class, 'get'])->name('admin-get-product');
    Route::any('/get-list', [ProductController::class, 'get_user_products'])->name('admin-products-get-list');
    Route::any('/add', [ProductController::class, 'add'])->name('add-product');
});