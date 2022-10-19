<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('/roles')->group(function(){
    Route::any('', [RoleController::class, 'list'])->name('admin-roles');
    Route::any('/get', [RoleController::class, 'get_user_role_list'])->name('admin-roles-get-list');
    Route::any('/get/{id}', [RoleController::class, 'get'])->name('admin-get-role');
    Route::any('/add', [RoleController::class, 'add'])->name('add-role');
    Route::any('/edit', [RoleController::class, 'edit'])->name('admin-edit-role');
    Route::any('/edit-role-access', [AccessController::class, 'edit_role_access'])->name('admin-edit-role-access');
});