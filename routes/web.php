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

    Route::resource('user','UserController');

    //Lấy ra danh sách bài viết của người dùng 
    Route::get('/user/dsbaiviet/{id}','UserController@DanhSachBaiViet')->name('user.dsbaiviet');

    Route::resource('chude','ChuDeController');

    Route::resource('post','BaiVietController');

    Route::get('/baiviet/tables','BaiVietController@index')->name('baiviet.tables');

    //Lấy ra danh sách bài viết hiện có
    Route::get('/baiviet/tables','BaiVietController@index')->name('post.tables');
    //Trả về view thêm bài viết
    Route::get('/baiviet/add','BaiVietController@create')->name('post.add');
    //Lấy ra chi tiết bài viết 
    Route::get('baiviet/chitiet/{id}','BaiVietController@show')->name('post.show');
    //Xử lí thêm bài viết
    Route::post('/baiviet/store','BaiVietController@store')->name('post.store');
    //Trả về view chỉnh sửa thông tin bài viết 
    Route::get('/baiviet/edit/{id}','BaiVietController@edit')->name('post.edit');
    //Xử lí chỉnh sửa thông tin bài viết 
    Route::post('/baiviet/update/{id}','BaiVietController@update')->name('post.update');
    //Xử lí xóa bài viết
    Route::get('/baiviet/delete/{id}','BaiVietController@destroy')->name('post.delete');
    //Xử lí duyệt bài viết
    Route::get('/baiviet/approval/{id}','BaiVietController@approval')->name('post.approval');

    Route::get('/baocao/baiviet','BaoCaoBaiVietController@index')->name('baocaobaiviet.tables');

    Route::get('/baocao/baiviet/{id}','BaoCaoBaiVietController@show')->name('baocaobaiviet.chitietbaocao');
    
    Route::get('/baocao/baiviet/xoa/{id}','BaoCaoBaiVietController@destroy')->name('baocaobaiviet.xoabaocao');
});
