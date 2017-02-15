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

Route::get('index','Auth\AuthController@index')->name('index');

Route::get('login','Auth\AuthController@getlogin')->name('login');

Route::post('login','Auth\AuthController@postlogin')->name('login');

Route::get('registro','Auth\AuthController@create')->name('registro');

Route::post('registro','Auth\AuthController@store')->name('registro');

Route::get('logout', 'Auth\AuthController@logout')->name('logout');

Route::get('password/email', 'Auth\PasswordController@getEmail')->name('recuperar');
Route::post('password/email', 'Auth\PasswordController@postEmail')->name('recuperar');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset')->name('reset');
Route::post('password/reset', 'Auth\PasswordController@postReset')->name('reset');


Route::get('/','FrontController@index')->name('home');
Route::get('/{slug}', 'FrontController@show');


Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function(){

    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UserController');

});

	Route::resource('comment', 'CommentController');
