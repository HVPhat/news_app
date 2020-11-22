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

Route::get('/', 'HomeController@index')->name('index');
Route::post('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/user/tables','UserController@index')->name('user.tables');
Route::get('/user/add','UserController@create')->name('user.add');
Route::post('/user/store','UserController@store')->name('user.store');
Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('/user/update/{id}','UserController@update')->name('user.update');
Route::get('/user/delete/{id}','UserController@destroy')->name('user.delete');
Route::get('/user/dsbaiviet/{id}','UserController@DanhSachBaiViet')->name('user.dsbaiviet');