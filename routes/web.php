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
Route::get('compare', 'Sites\HomeController@compare')->name('compare');
Route::get('compare/delete', 'Sites\HomeController@deleteCompare')->name('delcompare');

Route::get('wishlist', 'Sites\WishListController@index')->middleware('auth');
Route::get('wishlist/add', 'Sites\WishListController@addWishList');
Route::get('wishlist/delete', 'Sites\WishListController@deleteWishList');

Route::get('cart', 'Sites\CartController@index');
Route::get('cart/add', 'Sites\CartController@addToCart');
Route::get('cart/delete', 'Sites\CartController@deleteCart');
Route::get('cart/update', 'Sites\CartController@updateCart');
Route::get('checkout', 'Sites\CartController@checkout')->middleware('auth');
Route::resource('order', 'Sites\OrderController');

Route::get('product/{id}', 'Sites\ProductController@index');
Route::get('page/{id}', 'Sites\ProductController@pageProduct');

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

Route::get('product', 'Sites\ProductController@index')->name('product');
Route::post('product_comment', 'Sites\CommentsController@store')->name('product.comment.add');
Route::post('product_comment/edit', 'Sites\CommentsController@update')->name('product.comment.edit');
Route::post('product_comment/delete', 'Sites\CommentsController@destroy')->name('product.comment.delete');
Route::post('product_rate', 'Sites\RatesController@store')->name('product.rate');
