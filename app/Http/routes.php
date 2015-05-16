<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ProductController@index');

Route::get('about', 'HomeController@about');

Route::get('contact', 'HomeController@contact');

Route::post('cart', 'CartController@store');

Route::get('cart/checkout', ['middleware' => 'auth', 'uses'=>'CartController@checkout']);

Route::get('cart/{id}', 'CartController@destroy');

Route::resource('orders', 'OrderController');

Route::post('orders/upload', 'OrderController@upload');

Route::post('orders/verify', 'OrderController@verify');

Route::get('referrals', 'UserController@referrals');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource("products","ProductController");

Route::get('images/deposits/{id}', ['middleware' => 'auth', 'uses'=>'ImageController@deposits']);
Route::get('images/product/thumb/{id}', 'ImageController@thumb');
Route::get('images/product/{id}', 'ImageController@product');
