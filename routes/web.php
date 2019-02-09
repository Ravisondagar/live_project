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

Route::resource('department','DepartmentsController');
Route::view('admin','Admin.index')->middleware('auth');
Route::resource('user','UserController')->middleware('auth');
//Route::get('user','UserController@index')->middleware('auth')->name('user');
Route::post('userlogout','UserController@logout')->name('userlogout');
Auth::routes();
Route::resource('user-educations','UserEducationsController')->middleware('auth')->except('show');
Route::get('view-education/{slug}','UserEducationsController@show')->name('user-educations.show');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile','UserController@profile')->name('profile');
Route::post('profile-update','UserController@post_profile')->name('profile-update');
Route::get('change-password-form','UserController@change_password_form')->name('change-password-form');
Route::post('change-password','UserController@changepassword')->name('change-password');
Route::get('excel','UserController@export');

