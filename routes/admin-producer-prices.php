<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\ProductProducerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/prices')->group(function(){
    Route::any('/get/{producer_id}', [ProductPriceController::class, 'get'])->name('admin-get-producer-price');
    Route::post('/add', [ProductPriceController::class, 'add_with_request'])->name('admin-add-producer-price');

});