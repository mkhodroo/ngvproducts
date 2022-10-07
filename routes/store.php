<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInventoryController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('/store')->group(function(){
    Route::any('', [StoreController::class, 'list'])->name('admin-store');
    Route::any('/get-list', [StoreController::class, 'get_user_stores'])->name('admin-store-get-list');
    Route::any('/add', [StoreController::class, 'add'])->name('add-store');
});