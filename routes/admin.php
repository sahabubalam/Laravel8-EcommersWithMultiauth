<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\FileController;

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
    //color controller
    Route::get('/admin/color-list', [ColorController::class, 'index']);
    Route::get('/admin/add-color', [ColorController::class, 'addColor']);
    Route::post('/admin/insert-color', [ColorController::class, 'colorInsert'])->name('color.insert');
    Route::get('/admin/color-delete/{id}', [ColorController::class, 'delete']);
    Route::get('/admin/color-edit/{id}', [ColorController::class, 'editColor']);
    Route::post('/admin/update-color', [ColorController::class, 'colorUpdate'])->name('color.update');
    Route::get('/admin/color/status/{status}/{id}', [ColorController::class, 'status']);
    //product controller
    Route::get('/admin/product-list', [ProductController::class, 'index']);
    Route::get('/admin/add-product', [ProductController::class, 'addProduct']);
    Route::post('/admin/insert-product', [ProductController::class, 'productInsert'])->name('product.insert');
    Route::get('/admin/product-delete/{id}', [ProductController::class, 'delete']);
    Route::get('/admin/product-edit/{id}', [ProductController::class, 'editproduct']);
    Route::post('/admin/update-product', [ProductController::class, 'productUpdate'])->name('product.update');
    //file controller
    Route::get('/admin/add-file', [FileController::class, 'index']);
    Route::post('/admin/image', [FileController::class, 'store'])->name('insert.image');
    Route::get('/admin/file-list', [FileController::class, 'list']);
    Route::get('/admin/file-edit/{id}', [FileController::class, 'editFile']);
    Route::post('/admin/update-file', [FileController::class, 'fileUpdate'])->name('file.update');
    Route::get('/admin/file-delete/{id}', [FileController::class, 'delete']);
 });