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

Route::get('admin',[
    'as'=>'admin',
    'uses'=>'PageController@getadmin'
]);
Route::get('sign-in',[
    'as'=>'dangnhap',
    'uses'=>'PageController@getdangnhap'
]);
Route::post('sign-in',[
    'as'=>'dangnhap',
    'uses'=>'PageController@postdangnhap'
]);
Route::get('logout',[
    'as'=>'logout',
    'uses'=>'PageController@getlogout'
]);
Route::resource('user','userController');
Route::get('deleteUser','userController@deleteItem');

Route::resource('nhasanxuat','nhasanxuatController');
Route::post('deletenhasanxuat', 'nhasanxuatController@deleteItem');

Route::resource('danhmuc','danhmucController');
Route::post('adddanhmuc', 'danhmucController@addItem');
Route::post('editdanhmuc', 'danhmucController@editItem');
Route::post('deletedanhmuc', 'danhmucController@deleteItem');

Route::resource('nhomncc','nhomnccController');
Route::post('deletenhomncc', 'nhomnccController@deleteItem');

Route::resource('nhacungcap','nhacungcapController');
Route::post('deletenhacungcap', 'nhacungcapController@deleteItem');

Route::get('danhmucthuoc/{id}',[
    'as'=>'danhmucid',
    'uses'=>'PageController@getdanhmucid'
]);
Route::get('danhmucthuoc/{id}/create',[
    'as'=>'themthuoc',
    'uses'=>'PageController@getthemthuoc'
]);
Route::post('danhmucthuoc/{id}/create',[
    'as'=>'themthuoc',
    'uses'=>'PageController@postthemthuoc'
]);
Route::get('danhmucthuoc/{id}/edit/{idthuoc}',[
    'as'=>'suathuoc',
    'uses'=>'PageController@getsuathuoc'
]);
Route::post('danhmucthuoc/{id}/edit/{idthuoc}',[
    'as'=>'suathuoc',
    'uses'=>'PageController@postsuathuoc'
]);
Route::post('deletethuoc', 'PageController@deleteItem');

Route::resource('thuoc','thuocController');
Route::resource('nhomhang','nhomhangController');
Route::post('deletenhomhang', 'nhomhangController@deleteItem');

Route::resource('nhomdieutri','nhomdieutriController');
Route::post('addnhomdieutri', 'nhomdieutriController@addItem');
Route::post('editnhomdieutri', 'nhomdieutriController@editItem');
Route::post('deletenhomdieutri', 'nhomdieutriController@deleteItem');

Route::resource('donvitinh','donvitinhController');
Route::post('adddonvitinh', 'donvitinhController@addItem');
Route::post('editdonvitinh', 'donvitinhController@editItem');
Route::post('deletedonvitinh', 'donvitinhController@deleteItem');

Route::resource('cachsudung','cachsudungController');
Route::post('addcachsudung', 'cachsudungController@addItem');
Route::post('editcachsudung', 'cachsudungController@editItem');
Route::post('deletecachsudung', 'cachsudungController@deleteItem');

Route::resource('baoquan','baoquanController');
Route::post('addbaoquan', 'baoquanController@addItem');
Route::post('editbaoquan', 'baoquanController@editItem');
Route::post('deletebaoquan', 'baoquanController@deleteItem');

Route::resource('vitri','vitriController');
Route::post('addvitri', 'vitriController@addItem');
Route::post('editvitri', 'vitriController@editItem');
Route::post('deletevitri', 'vitriController@deleteItem');

Route::resource('benh','benhController');
Route::post('addbenh', 'benhController@addItem');
Route::post('editbenh', 'benhController@editItem');
Route::post('deletebenh', 'benhController@deleteItem');

Route::resource('khoa','khoaController');
Route::post('addkhoa', 'khoaController@addItem');
Route::post('editkhoa', 'khoaController@editItem');
Route::post('deletekhoa', 'khoaController@deleteItem');

Route::resource('bacsi','bacsiController');
Route::post('deletebacsi', 'bacsiController@deleteItem');