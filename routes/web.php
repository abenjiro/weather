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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'manage', 'middleware'=>'auth'],function(){

	Route::get('/', 'ManageController@index')->name('weather.dashboard');
	Route::get('/subscriber','ManageController@create')->name('weather.create');
	Route::post('/subscriber','ManageController@store')->name('weather.save');

	Route::post('/forecast', 'ForecastController@city')->name('search.forecast');
	Route::get('/forecast', 'ForecastController@forecast')->name('weather.forecast');
});

