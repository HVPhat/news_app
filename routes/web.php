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

Route::get('/', 'HomeController@index')->name('login');
Route::get('/login', 'HomeController@index')->name('login');
Route::post('/login', 'HomeController@login')->name('login');
Route::get('/', 'HomeController@logout')->name('logout');
Route::group(['middleware' => ['auth']], function () {
    Route::post('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    //Lấy ra danh sách người dùng hiện có
    Route::get('/user/tables','UserController@index')->name('user.tables');
    //Trả về view thêm người dùng 
    Route::get('/user/add','UserController@create')->name('user.add');
    //Xử lí thêm người dùng
    Route::post('/user/store','UserController@store')->name('user.store');
    //Trả về view chỉnh sửa thông tin người dùng
    Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
    //Xử lí chỉnh sửa thông tin người dùng 
    Route::post('/user/update/{id}','UserController@update')->name('user.update');
    //Xử lí xóa người dùng
    Route::get('/user/delete/{id}','UserController@destroy')->name('user.delete');
    //Lấy ra danh sách bài viết của người dùng 
    Route::get('/user/dsbaiviet/{id}','UserController@DanhSachBaiViet')->name('user.dsbaiviet');
    //Lấy ra tác giả của bài viết 
    Route::get('/baiviet/tacgia/','BaiVietController@TacGia')->name('baiviet.tacgia');
    //Lấy ra chủ đề của bài viết 
    Route::get('/baiviet/chude/{id}','BaiVietController@ChuDe')->name('baiviet.chude');
});