<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInventoryController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('/inventory')->group(function(){
    Route::any('', [ProductInventoryController::class, 'list'])->name('admin-inventory');
    Route::any('list-in-each-store', [ProductInventoryController::class, 'list_in_each_store'])->name('admin-inventory-for-each-store');
    Route::any('/get-list', [ProductInventoryController::class, 'get_user_inventories'])->name('admin-inventory-get-list');
    Route::any('/get-list-for-each-store', [ProductInventoryController::class, 'get_user_inventories_for_each'])->name('admin-inventory-get-list-for-each-store');
    Route::any('/add', [ProductInventoryController::class, 'add'])->name('add-inventory');
});