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

Route::get('/', 'ProductController@index');

Route::get('product/{product}', 'ProductController@products');
Route::post('product', 'ProductController@addToCart');

Route::get('/cart', 'CartController@index')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'CartController@clearCart')->name('checkout.cart.clear');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
