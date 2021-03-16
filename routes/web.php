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

Route::get('/', 'EmployeeController@index');
Route::get('employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
Route::post('employee/update', 'EmployeeController@update')->name('employee.update');
