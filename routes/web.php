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
Route::get('list',"LibraryController@list_inf");
Route::get('book_get',"LibraryController@book_get");
Route::post('book_edit/{id}',"LibraryController@book_edit")->name('book_edit');
Route::get('book_form',"LibraryController@book_form");
Route::get('book_register',"LibraryController@book_register");
Route::post('book_update/{id}',"LibraryController@book_update")->name('book_update');
Route::post('book_id/{id}',"LibraryController@book_id");



//for user
Route::get('user_form',"UserController@user_form");
Route::get('user_register',"UserController@user_register");
Route::get('user_get',"UserController@user_get");
//Route::get('user_login',"UserController@user_login");
Route::post('user_login',"UserController@user_login");
Route::get('user_check',"UserController@user_check");
Route::get('returncost',"UserController@returncost");

//Route::get('/test', function(){
//    return 200;
//});
