<?php

use App\Http\Controllers\ProducerFeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\ProductProducerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/features')->group(function(){
    Route::any('/get/{producer_id}', [ProducerFeatureController::class, 'get'])->name('admin-get-producer-feature');
    Route::post('/add', [ProducerFeatureController::class, 'add_with_request'])->name('admin-add-producer-feature');

});