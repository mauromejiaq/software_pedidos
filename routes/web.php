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


Route::get('/', 'OrdersController@index');


Route::get('/category', function () {
    return view('backend/categories');
});

Route::get('/vcategory', function () {
    return view('backend/add_category');
});


Route::get('forgetCart', 'CartController@forgetCart');
Route::get('complete', 'CartController@index');

Route::resource('category', 'CategoryController');
Route::resource('products', 'ProductsController');
Route::resource('customer', 'CustomerController');
Route::resource('cart', 'CartController');
Route::resource('order', 'OrdersController');
