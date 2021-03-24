<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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
 });