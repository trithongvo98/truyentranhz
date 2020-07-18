<?php

use Illuminate\Support\Facades\Route;

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
    return view('danhsach');
});
Route::get('admin/dangnhap','userController@getdangnhapAdmin');
Route::post('admin/dangnhap','userController@postdangnhapAdmin');
Route::get('admin/logout','userController@getlogout');


Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','theloaiController@getdanhsach');

		Route::get('sua/{id}','theloaiController@getsua');
		Route::post('sua/{id}','theloaiController@postsua');

		Route::get('them','theloaiController@getthem');
		Route::post('them','theloaiController@postthem');

		Route::get('xoa/{id}','theloaiController@getxoa');
	});
	Route::group(['prefix'=>'truyen'],function(){
		Route::get('danhsach','truyenController@getdanhsach');
		Route::get('sua/{id}','truyenController@getsua');
		Route::post('sua/{id}','truyenController@postsua');
		Route::get('them','truyenController@getthem');
		Route::post('them','truyenController@postthem');
		Route::get('truyendadang','truyenController@gettruyendadang');
		Route::get('themTL/{id}','truyenController@getthemTL');
		Route::post('themTL/{id}','truyenController@postthemTL');
		Route::post('xoaTL/{id}','truyenController@postxoaTL');
		Route::get('xoa/{id}','truyenController@getxoa');
	});
	Route::group(['prefix'=>'chapter'],function(){
		Route::get('danhsach','chapterController@getdanhsach');

		Route::get('sua/{id}','chapterController@getsua');
		Route::post('sua/{id}','chapterController@postsua');

		Route::get('them/{id}','chapterController@getthem');
		Route::post('them/{id}','chapterController@postthem');
		Route::get('xoa/{id}','chapterController@getxoa');
	});

	Route::group(['prefix'=>'comment'],function(){
		Route::get('xoa/{id}/{idtruyen}','commentController@getxoa');

	});

	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','slideController@getdanhsach');

		Route::get('sua/{id}','slideController@getsua');
		Route::post('sua/{id}','slideController@postsua');

		Route::get('them','slideController@getthem');
		Route::post('them','slideController@postthem');

		Route::get('xoa/{id}','slideController@getxoa');
	});


	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','userController@getdanhsach');

		Route::get('sua/{id}','userController@getsua');
		Route::post('sua/{id}','userController@postsua');

		Route::get('them','userController@getthem');
		Route::post('them','userController@postthem');

		Route::get('xoa/{id}','userController@getxoa');
	});
});


Route::get('trangchu','pagesController@trangchu');
Route::get('lienhe','pagesController@lienhe');
Route::get('truyen','pagesController@truyen');

Route::get('dangnhap','pagesController@getdangnhap');
Route::post('dangnhap','pagesController@postdangnhap');
Route::get('dangxuat','pagesController@getdangxuat');
Route::get('nguoidung','pagesController@getnguoidung');
Route::post('nguoidung','pagesController@postnguoidung');
Route::get('dangky','pagesController@getdangky');
Route::post('dangky','pagesController@postdangky');
Route::get('action','pagesController@getaction');
Route::get('fantansy','pagesController@getfantansy');
Route::get('chitiet/{id}','pagesController@getchitiet');
Route::get('chapter/{id}','pagesController@getchapter');
Route::post('comment/{id}','commentController@postcomment');
Route::get('timkiem', 'pagesController@gettimkiem');