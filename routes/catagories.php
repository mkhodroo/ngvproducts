<?php

use App\Http\Controllers\ProductCatagoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductProducerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/catagories')->group(function(){
    Route::any('/show/{name}', [ProductController::class, 'get_by_catagory_name'])->name('show-catagory-by-name');
    Route::any('/get-details/{id}', [ProductProducerController::class, 'get'])->name('product-get-details');

});