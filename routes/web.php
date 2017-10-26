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

Route::get('/', function () {
    return view('welcome');
});
//For admin
Route::get('admin_form',"AdminController@admin_form");
Route::post('admin_register',"AdminController@admin_register");
Route::get('admin_get',"AdminController@admin_get");
Route::get('admin_list_user',"AdminController@admin_list_user");
Route::get('admin_check',"AdminController@admin_check");
//Route::get('admin_login',"AdminController@admin_login");
Route::post('admin_login',"AdminController@admin_login");
Route::post('upload',"AdminController@admin_upload");

//for book
Route::get('list',"BookController@list_inf");
Route::get('book_get',"BookController@book_get");
Route::post('book_edit/{id}',"BookController@book_edit")->name('book_edit');
Route::get('book_form',"BookController@book_form");
Route::get('book_register',"BookController@book_register");
Route::post('book_update/{id}',"BookController@book_update")->name('book_update');
Route::post('book_id/{id}',"BookController@book_id");


Route::get('borrow',"BorrowController@get_borrow");
Route::get('list_borrow',"BorrowController@list_borrow");



//for user
Route::get('user_form',"ERAUserController@user_form");
Route::get('user_register',"ERAUserController@user_register");
Route::get('user_get',"ERAUserController@user_get");
//Route::get('user_login',"UserController@user_login");
Route::post('user_login',"ERAUserController@user_login");
Route::get('user_check',"ERAUserController@user_check");
Route::get('returncost',"ERAUserController@returncost");

//Route::get('/test', function(){
//    return 200;
//});
