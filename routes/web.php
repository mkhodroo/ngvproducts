<?php

use App\Events\SendSms;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Jobs\CreatePDFJob;
use App\Models\Product;
use Illuminate\Support\Facades\Artisan;
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

Route::get('test/', function(){
    $data = array(
        'organization' => 'irngv',
        'username' => 'irngv',
        'password' => 'irngv123',
        'method' => 'send',
        'messages' => array([
            'sender' => '9820003807',
            'recipient' => '09376922176',
            'body' => 'test',
            'customerId' => 1,
        ]
        )
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://new.payamsms.com/services/rest/index.php');
    # Setup request to send json via GET.
    $payload = json_encode($data);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, False);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, False);

    # Return response instead of printing.
    # Send request.
    $er = curl_error($ch);
    var_dump($er);
    $result = curl_exec($ch);
    curl_close($ch);
});

Route::get('event', function(){
    event(new SendSms("09376922176", "salam"));
});

Route::get('build-app', function () {
    Artisan::call('cache:clear');
    Artisan::call('migrate');
    return 'done';
});

Route::get('queue-start', function () {
    Artisan::call('queue:work');
    return 'queue started.';
});

Route::get('queue-stop', function () {
    Artisan::call('queue:restart');
    return 'queue stoped.';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::any('/get-newest-products', [ProductController::class, 'newest_products'])->name('get-newest_products');

Route::get('create-pdf', function(){
    CreatePDFJob::dispatch();
    return "asd";
});

Route::prefix('/admin')->middleware(['access'])->group(function(){
    require __DIR__.'/admin-products.php';
    require __DIR__.'/admin-producer-prices.php';
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
