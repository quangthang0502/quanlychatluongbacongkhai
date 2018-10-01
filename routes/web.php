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

/*
 *  Login
 */

Route::get('/', 'Auth\LoginController@index')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::get('/dang-xuat', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function (){
	Route::get('/dashboard', 'MainController@dashboard')->name('dashboard');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin/user', 'middleware' => 'auth'], function (){
	Route::get('/', 'UserController@index')->name('admin.user.index');

	Route::get('create', 'UserController@create')->name('admin.user.create');
	Route::post('create', 'UserController@postCreate');

	Route::get('edit/{id}', 'UserController@edit')->name('admin.user.edit');
	Route::post('edit/{id}', 'UserController@postEdit');

	Route::get('remove', 'UserController@delete')->name('admin.user.delete');
});
