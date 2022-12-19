<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductProducerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/products')->group(function(){
    Route::any('', [ProductController::class, 'list'])->name('admin-products');
    Route::any('/edit', [ProductController::class, 'edit'])->name('admin-edit-product');
    Route::any('/get/{id}', [ProductController::class, 'get'])->name('admin-get-product');
    Route::any('/get-list', [ProductController::class, 'get_user_products'])->name('admin-products-get-list');
    Route::any('/add', [ProductController::class, 'add'])->name('add-product');
    Route::any('/add-image', [ProductImageController::class, 'add'])->name('add-product-image');
    Route::any('/remove-image', [ProductImageController::class, 'remove'])->name('remove-product-image');
    Route::any('/delete-image-by-id/{id}', [ProductImageController::class, 'delete_by_id'])->name('delete-product-image-by-id');
    Route::any('/edit-producer', [ProductProducerController::class, 'edit'])->name('admin-edit-product-producer');

});