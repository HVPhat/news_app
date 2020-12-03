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

    Route::get('/chude/tables','ChuDeController@index')->name('chude.tables');

    Route::get('/chude/add','ChuDeController@create')->name('chude.add');
    
    Route::post('/chude/store','ChuDeController@store')->name('chude.store');
    
    Route::get('/chude/edit/{id}','ChuDeController@edit')->name('chude.edit');

    Route::post('/chude/update/{id}','ChuDeController@update')->name('chude.update');

    Route::get('/chude/delete/{id}','ChuDeController@destroy')->name('chude.delete');

    Route::get('/baiviet/tables','BaiVietController@index')->name('baiviet.tables');

    Route::get('/baocao/baiviet','BaoCaoBaiVietController@index')->name('baocaobaiviet.tables');

    Route::get('/baocao/baiviet/{id}','BaoCaoBaiVietController@show')->name('baocaobaiviet.chitietbaocao');
    
    Route::get('/baocao/baiviet/xoa/{id}','BaoCaoBaiVietController@destroy')->name('baocaobaiviet.xoabaocao');

    //Lấy ra danh sách bài viết hiện có
    Route::get('/baiviet/tables','BaiVietController@index')->name('post.tables');
    //Trả về view thêm bài viết
    Route::get('/baiviet/add','BaiVietController@create')->name('post.add');
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
});
