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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/users', 'UserController');
/*
Route::get('/users', 'UserController@index')->name('users.index');
Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::get('/users/{post}', 'UserController@show')->name('users.show');
Route::put('/users/{post}', 'UserController@update')->name('users.update');
Route::delete('/users/{post}', 'UserController@destroy')->name('users.destroy');
Route::get('/users/{post}/edit', 'UserController@edit')->name('users.edit');
*/

Route::resource('/roles', 'RoleController');
Route::resource('/permissions', 'PermissionController');
