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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['middleware' => ['web','auth']], function () {

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
	Route::resource('chalets', 'ChaletController');
	Route::resource('attributes', 'AttributeController');
	Route::resource('orders', 'OrderController');
});

