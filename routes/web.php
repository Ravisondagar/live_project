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
Route::post('userlogout','UserController@logout')->name('userlogout');
Auth::routes();
Route::resource('user-educations','UserEducationsController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
