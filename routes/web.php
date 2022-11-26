<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::any('/get-newest-products', [ProductController::class, 'newest_products'])->name('get-newest_products');


Route::prefix('/admin')->middleware(['access'])->group(function(){
    require __DIR__.'/admin-products.php';
    require __DIR__.'/inventory.php';
    require __DIR__.'/store.php';
    require __DIR__.'/orders.php';
    require __DIR__.'/methods.php';
    require __DIR__.'/product-catagories.php';
    require __DIR__.'/roles.php';
});

require __DIR__.'/carts.php';
require __DIR__.'/checkout.php';
require __DIR__.'/myorders.php';
require __DIR__.'/products.php';
require __DIR__.'/catagories.php';
require __DIR__.'/address.php';
require __DIR__.'/search.php';



require __DIR__.'/auth.php';
