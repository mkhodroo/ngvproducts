<?php

use App\Http\Controllers\MethodController;
use App\Http\Controllers\ProductCatagoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('/product-catagories')->group(function(){
    Route::any('', [ProductCatagoryController::class, 'list'])->name('admin-catagories');
    Route::any('/add', [ProductCatagoryController::class, 'add'])->name('add-product-catagory');
});