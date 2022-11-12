<?php

use App\Http\Controllers\MethodController;
use App\Http\Controllers\ProductCatagoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('/product-catagories')->group(function(){
    Route::any('', [ProductCatagoryController::class, 'list'])->name('admin-catagories');
    Route::any('/add', [ProductCatagoryController::class, 'add'])->name('add-product-catagory');
    Route::any('/get-list', [ProductCatagoryController::class, 'get_catagories'])->name('admin-catagories-get-list');
    Route::any('/get/{id}', [ProductCatagoryController::class, 'get'])->name('admin-get-catagory');
    Route::any('/edit', [ProductCatagoryController::class, 'edit'])->name('admin-edit-catagory');

});