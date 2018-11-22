<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware( 'auth:api' )->get( '/user', function ( Request $request ) {
	return $request->user();
} );

Route::group( [ 'namespace' => 'Api' ], function () {
	Route::get( 'bo-phan', 'ApiController@getBoPhan' )->name( 'api.bo-phan' );

	Route::post( 'bo-phan', 'ApiController@postBoPhan' );

	Route::get( 'truong-hoc', 'ApiController@getUniversities' )->name( 'api.university' );

	Route::post( 'truong-hoc', 'ApiController@createUniversity' );

} );

