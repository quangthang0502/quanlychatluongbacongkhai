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

	Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function (){
		Route::get('quan-ly-user', 'UserController@index')->name('admin.index');
	});
});
