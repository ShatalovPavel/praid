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
	//json link
	Route::get('/chart','IndexController@chart');
	Route::get('/currency/{alias}','CurrencyController@execute')->name('currency');
	Route::get('/currency/{alias}/chart','CurrencyController@chart');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
