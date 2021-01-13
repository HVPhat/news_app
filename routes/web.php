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
    //Route Resource BaiVietController
    Route::resource('post','BaiVietController');
    //Xử lí chỉnh sửa thông tin bài viết, function update k hỗ trợ method POST
    Route::post('/baiviet/update/{id}','BaiVietController@update')->name('post.update');
    //Xử lí duyệt bài viết
    Route::get('/baiviet/approval/{id}','BaiVietController@approval')->name('post.approval');

    //Route Resource BinhLuanController
    Route::resource('binhluan','BinhLuanController');

    Route::get('/baocao/baiviet','BaoCaoBaiVietController@index')->name('baocaobaiviet.tables');

    Route::get('/baocao/baiviet/{id}','BaoCaoBaiVietController@show')->name('baocaobaiviet.chitietbaocao');
    
    Route::get('/baocao/baiviet/xoabaocao/{id}','BaoCaoBaiVietController@XoaBaoCao')->name('baocaobaiviet.xoabaocao');

    Route::get('/baocao/baiviet/xoabaiviet/{id}','BaoCaoBaiVietController@XoaBaiViet')->name('baocaobaiviet.xoabaiviet');
});
