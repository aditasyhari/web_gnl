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


Route::get('/', 'user\UserController@index');
Route::get('product', 'user\UserController@product');
Route::get('faq', 'user\UserController@faq');
Route::get('about', 'user\UserController@about');

Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login')->name('login');
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
 
    Route::resource('/admin/product', 'admin\ProductController');
    Route::resource('/admin/product/category', 'admin\CategoryController');
    Route::delete('/admin/product/singlecategory/{singlecategory}', 'admin\CategoryController@destroy2');
    Route::resource('/admin/product/subcategory', 'admin\SubCategoryController');

    Route::resource('/admin/settings/akun', 'admin\AkunController');
    Route::resource('/admin/settings/about', 'admin\AboutController');
    Route::resource('/admin/settings/faq', 'admin\FaqController');
    Route::resource('/admin/settings/banner', 'admin\BannerController');
    Route::resource('/admin/settings/socmed', 'admin\SocmedController');

    Route::get('logout', 'AuthController@logout')->name('logout');
});

// 