<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Frontend\WishlistController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/user/logout', [HomeController::class, 'Logout'])->name('logout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product/by/category/{id}', [CategoryController::class, 'productByCategory']);
Route::get('/product-details/{id}', [CategoryController::class, 'productDetails']);
Route::post('/cart/product/{id}',[CartController::class, 'AddCart']);
Route::get('showcart',[CartController::class, 'showcart'])->name('show-cart');
Route::get('shipping-cart',[CartController::class, 'shippingCart'])->name('shipping-cart')->middleware('auth');


// SSLCOMMERZ Start
Route::group(['middleware' => 'auth'], function () {
    
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('example2');

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
   
});
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
//SSLCOMMERZ END 
//wishlist
Route::get('/wishlist/{id}', [WishlistController::class, 'addWishlist'])->name('wishlist')->middleware('auth');
Route::get('/wishlist', [WishlistController::class, 'Wishlist'])->name('front.wishlist')->middleware('auth');
Route::get('/add/cart/{id}', [WishlistController::class, 'addCart'])->name('add.cart')->middleware('auth');

