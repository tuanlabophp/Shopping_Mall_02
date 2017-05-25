<?php

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

Route::get('admin', 'AdminController@index')->middleware('admin');
Route::get('/', 'Sites\HomeController@index')->name('/');
Route::get('search', 'Sites\HomeController@search')->name('search');

//login logout
Route::post('login', 'LoginController@login')->name('login');
Route::get('login', 'LoginController@checkLogin');
Route::get('logout', 'LoginController@logout')->name('logout');
Route::get('register', 'LoginController@checkUserRegister');
Route::post('register', 'LoginController@userRegister')->name('register');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('order', 'OrderController');
    Route::resource('comment', 'CommentController');
    Route::get('rate', 'RateController@index')->name('rate');
    Route::resource('user', 'UserController');
});

Route::get('admin/profile', 'AdminController@profile')->name('admin.profile');
Route::get('cart', 'CartController@addToCart');
Route::get('cart/delete', 'CartController@deleteCart');
