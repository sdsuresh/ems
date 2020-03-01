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

Route::get('/', 'UserController@index');
Route::get('/user/create', 'UserController@create')->name('users.create');
Route::post('/user/store', 'UserController@store')->name('users.store');
Route::get('/user/edit/{id}', 'UserController@edit')->name('users.edit');
Route::post('/user/update', 'UserController@update')->name('users.update');
