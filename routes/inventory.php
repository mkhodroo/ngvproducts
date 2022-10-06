<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInventoryController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('/inventory')->group(function(){
    Route::any('', [ProductInventoryController::class, 'list'])->name('admin-inventory');
    Route::any('/get-list', [ProductInventoryController::class, 'get_user_inventories'])->name('admin-inventory-get-list');
    Route::any('/add', [ProductInventoryController::class, 'add'])->name('add-inventory');
});