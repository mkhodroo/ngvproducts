<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductProducerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/products')->group(function(){
    Route::any('/show/{id}', [ProductController::class, 'show'])->name('product-show');
    Route::any('/get-details/{id}', [ProductProducerController::class, 'get_details'])->name('product-get-details');

});