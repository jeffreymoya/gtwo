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

Route::get('cart/checkout', 'CartController@checkout');

Route::get('cart/{id}', 'CartController@destroy');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource("products","ProductController");
