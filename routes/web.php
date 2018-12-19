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

Route::group(['middleware'=>'web'],function(){

	Route::get('/','IndexController@execute')->name('home');
	Route::get('/currency/{alias}','CurrencyController@execute')->name('currency');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
