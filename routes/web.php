<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.dashboard.main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/admin')->middleware(['auth'])->group(function(){
    require __DIR__.'/products.php';
    require __DIR__.'/inventory.php';
    require __DIR__.'/store.php';
    require __DIR__.'/methods.php';
});



require __DIR__.'/auth.php';
