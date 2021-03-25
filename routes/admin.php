<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SizeController;

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

Route::get('/admin-login', function () {
    return view('admin.auth.login');
})->name('admin.login');



//admin area

Route::group(['namespace' => 'App\HttpControllers\Admin', 'middleware' => 'is_admin'], function(){
    Route::get('/admin/home', [AdminController::class, 'adminIndex'])->name('admin.home');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    //category controller
    Route::get('/admin/category-list', [CategoryController::class, 'index']);
    Route::get('/admin/add-category', [CategoryController::class, 'addCategory']);
    Route::post('/admin/insert-category', [CategoryController::class, 'categoryInsert'])->name('category.insert');
    Route::get('/admin/category-delete/{id}', [CategoryController::class, 'delete']);
    Route::get('/admin/category-edit/{id}', [CategoryController::class, 'editCategory']);
    Route::post('/admin/update-category', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::get('/admin/category/status/{status}/{id}', [CategoryController::class, 'status']);
    //coupon controller
    Route::get('/admin/coupon-list', [CouponController::class, 'index']);
    Route::get('/admin/add-coupon', [CouponController::class, 'addCoupon']);
    Route::post('/admin/insert-coupon', [CouponController::class, 'couponInsert'])->name('coupon.insert');
    Route::get('/admin/coupon-delete/{id}', [CouponController::class, 'delete']);
    Route::get('/admin/coupon-edit/{id}', [CouponController::class, 'editCoupon']);
    Route::post('/admin/update-coupon', [CouponController::class, 'couponUpdate'])->name('coupon.update');
    Route::get('/admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);
    //size controller
    Route::get('/admin/size-list', [SizeController::class, 'index']);
    Route::get('/admin/add-size', [SizeController::class, 'addSize']);
    Route::post('/admin/insert-size', [SizeController::class, 'sizeInsert'])->name('size.insert');
    Route::get('/admin/size-delete/{id}', [SizeController::class, 'delete']);
    Route::get('/admin/size-edit/{id}', [SizeController::class, 'editSize']);
    Route::post('/admin/update-size', [SizeController::class, 'sizeUpdate'])->name('size.update');
    Route::get('/admin/size/status/{status}/{id}', [SizeController::class, 'status']);
 });