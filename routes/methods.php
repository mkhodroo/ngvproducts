<?php

use App\Http\Controllers\MethodController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('/methods')->group(function(){
    Route::any('', [MethodController::class, 'list'])->name('admin-methods');
    Route::any('/add', [MethodController::class, 'add'])->name('add-method');
});