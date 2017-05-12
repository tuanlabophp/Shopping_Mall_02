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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/order', 'OrderController@index');
Route::get('/index', function () {
    return view('sites.master');
});
Route::get('/login', function () {
    return view('auth.login');
});
// Route::post('/login', function () {
//     return view('auth.login');
// });
Route::get('/admin/user', 'UserController@index');
Route::resource('user', 'UserController');
