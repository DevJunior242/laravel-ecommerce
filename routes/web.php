<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FootController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestMailController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::fallback(function () {
    return response()->view('error.404');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::get('/', [HomeController::class, 'index']);



Route::get('/details/{id}', [HomeController::class, 'details']);
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->middleware('auth');
Route::get('/cart', [HomeController::class, 'cart'])->middleware('auth');

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/view_product', [AdminController::class, 'view_product']);

Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/edit_view/{product}', [AdminController::class, 'edit_view']);

Route::put('/update_product/{id}', [AdminController::class, 'update_product']);

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

Route::get('/show_cart', [AdminController::class, 'show_cart'])->middleware('auth');

Route::get('/home_cart', [AdminController::class, 'home_cart'])->middleware('auth');
Route::get('/delete_cart/{hashid}/{connection}', [AdminController::class, 'delete_cart'])->middleware('auth');
Route::get('/cash_order', [AdminController::class, 'cash_order'])->middleware('auth');
Route::get('/order', [AdminController::class, 'order'])->middleware('auth');
Route::get('/user/order', [HomeController::class, 'Userorder'])->middleware('auth');

Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->middleware('auth');
// Route::get('/pdf/{id}', [AdminController::class, 'pdf'])->middleware('auth');

//stripe 


Route::get('/stripe/{hash}/{connection}', [StripeController::class, 'stripe']);
Route::post('/stripe/{hashid}/{connection}', [StripeController::class, 'stripePost'])->name('stripe.post');


Route::get('foot', [FootController::class, 'foot']);

Route::post('foot', [FootController::class, 'store']);
Route::get('footShow', [FootController::class, 'footShow']);

Route::get('sendmail', [TestMailController::class, 'index']);
Route::get('notify', [UserController::class, 'index']);
Route::post('/subscribe', [UserController::class, 'subscribe'])->middleware('auth');

Route::get('foot', [FootController::class, 'foof']);

// Route::get('google', [GoogleController::class, 'index']);

//cinetpay

Route::get('pay', [PaymentController::class, 'pay']);
Route::post('pay/success', [PaymentController::class, 'store']);
Route::get('pay/orders/{id}', [PaymentController::class, 'payment']);
