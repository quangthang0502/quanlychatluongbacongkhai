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

Route::get( '/', 'Auth\LoginController@index' )->name( 'login' );
Route::post( '/', 'Auth\LoginController@login' );
Route::get( '/dang-xuat', 'Auth\LoginController@logout' )->name( 'logout' );

Route::group( [ 'middleware' => 'auth' ], function () {
	Route::get( '/dashboard', 'MainController@dashboard' )->name( 'dashboard' );

	Route::get( '{slug}/dashboard', 'MainController@dashboardUniversity' )->name( 'dashboard.university' );
} );

Route::group( [
	'namespace'  => 'Admin',
	'prefix'     => 'admin/user',
	'middleware' => [ 'auth', 'check.role' ]
], function () {
	Route::get( '/', 'UserController@index' )->name( 'admin.user.index' );

	Route::get( 'tao-moi', 'UserController@create' )->name( 'admin.user.create' );
	Route::post( 'tao-moi', 'UserController@postCreate' )->name( 'admin.user.postCreate' );

	Route::get( 'chinh-sua/{id}', 'UserController@edit' )->name( 'admin.user.edit' );
	Route::post( 'chinh-sua/{id}', 'UserController@postEdit' )->name( 'admin.user.postEdit' );

	Route::get( 'xoa/{id}', 'UserController@delete' )->name( 'admin.user.delete' );
} );

Route::group( [
	'namespace'  => 'Admin',
	'prefix'     => 'admin/thong-ke',
	'middleware' => [ 'auth', 'check.role' ]
], function () {
	Route::get( '/{year}', 'ThongKe@index' )->name( 'admin.thongke.index' );
} );

Route::group( [
	'namespace'  => 'University',
	'middleware' => [ 'auth', 'check.role' ],
	'prefix'     => '{slug}'
], function () {

	Route::get( 'edit-profile', 'UniversityController@edit' )->name( 'university.dashboard.edit' );
	Route::post( 'edit-profile', 'UniversityController@postEdit' )->name( 'university.dashboard.postEdit' );

	Route::group( [ 'prefix' => 'tai-khoan' ], function () {
		Route::get( '/', 'UserController@index' )->name( 'university.user.index' );

		Route::get( 'tao-moi', 'UserController@create' )->name( 'university.user.create' );
		Route::post( 'tao-moi', 'UserController@postCreate' )->name( 'university.user.postCreate' );

		Route::get( 'chinh-sua/{id}', 'UserController@edit' )->name( 'university.user.edit' );
		Route::post( 'chinh-sua/{id}', 'UserController@postEdit' )->name( 'university.user.postEdit' );

		Route::get( 'xoa/{id}', 'UserController@delete' )->name( 'university.user.delete' );
	} );

	Route::group( [ 'prefix' => 'gioi-thieu' ], function () {
		Route::get( '/', 'IntroductionController@index' )->name( 'university.intro.index' );

		Route::get( 'tao-moi', 'IntroductionController@create' )->name( 'university.intro.create' );
		Route::post( 'tao-moi', 'IntroductionController@postCreate' )->name( 'university.intro.postCreate' );

		Route::get( 'chinh-sua/{gioiThieu}', 'IntroductionController@edit' )->name( 'university.intro.edit' );
		Route::post( 'chinh-sua/{gioiThieu}', 'IntroductionController@postEdit' )->name( 'university.intro.postEdit' );
	} );
} );

Route::group( [
	'namespace'  => 'Leaders',
	'middleware' => [ 'auth', 'check.role' ],
	'prefix'     => '{slug}/can-bo-chu-chot'
], function () {
	Route::get( '/{year}', 'UniversityLeaders@index' )->name( 'university.leaders.index' );

	Route::get( 'chinh-sua/{year}', 'UniversityLeaders@create' )->name( 'university.leaders.create' );
	Route::post( 'chinh-sua', 'UniversityLeaders@postCreate' )->name( 'university.leaders.postCreate' );

	Route::get( 'xoa/{id}', 'UniversityLeaders@delete' )->name( 'university.leaders.delete' );
} );

Route::group( [
	'namespace'  => 'University',
	'middleware' => [ 'auth', 'check.role' ],
	'prefix'     => '{slug}/dao-tao'
], function () {
	Route::get( '/{year}', 'Training@index' )->name( 'university.training.index' );

	Route::post( 'chinh-sua/{daoTao}', 'Training@postCreate' )->name( 'university.training.postCreate' );
} );

Route::group( [
	'namespace'  => 'University',
	'middleware' => [ 'auth', 'check.role' ],
	'prefix'     => '{slug}/can-bo-nhan-vien'
], function () {
	Route::get( '/{year}', 'Teacher@index' )->name( 'university.teacher.index' );

	Route::get( 'chinh-sua/{year}', 'Teacher@create' )->name( 'university.teacher.create' );
	Route::post( 'chinh-sua/{year}', 'Teacher@postCreate' )->name( 'university.teacher.postCreate' );

	Route::post( 'chinh-sua-giang-vien/{year}', 'Teacher@updateTeacher' )->name( 'university.teacher.updateTeacher' );
	Route::post( 'chinh-sua-trinh-do/{year}', 'Teacher@updateLevel' )->name( 'university.teacher.updateLevel' );

	Route::get( 'xoa/{id}', 'Teacher@delete' )->name( 'university.teacher.delete' );
} );

Route::group( [
	'namespace'  => 'University',
	'middleware' => [ 'auth', 'check.role' ],
	'prefix'     => '{slug}/nguoi-hoc'
], function () {
	Route::get( '/{year}', 'Students@index' )->name( 'university.student.index' );

	Route::get( 'chinh-sua/{year}', 'Students@create' )->name( 'university.student.create' );
	Route::post( 'chinh-sua/{year}', 'Students@postCreate' )->name( 'university.student.postCreate' );

	Route::post( 'chinh-sua-chinh-quy/{year}', 'Students@updateStudents' )->name( 'university.student.updateStudents' );

	Route::get( 'xoa/{id}', 'Students@delete' )->name( 'university.student.delete' );
} );

Route::group( [
	'namespace'  => 'University',
	'middleware' => [ 'auth', 'check.role' ],
	'prefix'     => '{slug}/sinh-vien-tot-nghiep'
], function () {
	Route::get( '/{year}', 'SinhVienTotNghiep@index' )->name( 'university.sv.index' );

	Route::get( 'chinh-sua/{year}', 'SinhVienTotNghiep@create' )->name( 'university.sv.create' );
	Route::post( 'chinh-sua/{year}', 'SinhVienTotNghiep@postCreate' )->name( 'university.sv.postCreate' );
	Route::post( 'chinh-sua-sv-dh/{year}', 'SinhVienTotNghiep@svDaiHoc' )->name( 'university.sv.svDaiHoc' );
	Route::post( 'chinh-sua-sv-cd/{year}', 'SinhVienTotNghiep@svCaoDang' )->name( 'university.sv.svCaoDang' );

} );

Route::group( [
	'namespace'  => 'University',
	'middleware' => [ 'auth', 'check.role' ],
	'prefix'     => '{slug}/nckh'
], function () {
	Route::get( '/{year}', 'Research@index' )->name( 'university.research.index' );

    Route::get( 'chinh-sua/{year}', 'Research@create' )->name( 'university.research.create' );
    Route::post( 'chinh-sua/{year}', 'Research@postCreate' )->name( 'university.research.postCreate' );

    Route::post( 'chinh-sua-sach/{year}', 'Research@suaSach' )->name( 'university.research.suaSach' );
    Route::post( 'chinh-tap-chi/{year}', 'Research@tapChi' )->name( 'university.research.tapChi' );
    Route::post( 'chinh-sua-sach-2/{year}', 'Research@hoiThao' )->name( 'university.research.hoiThao' );
    Route::post( 'bang-sang-che/{year}', 'Research@bangSangche' )->name( 'university.research.bangSangche' );

} );

Route::group( [
	'namespace'  => 'University',
	'middleware' => [ 'auth', 'check.role' ],
	'prefix'     => '{slug}/co-so-vat-chat-va-tai-chinh'
], function () {
	Route::get( '/{year}', 'Infrastructure@index' )->name( 'university.infrastructure.index' );

	Route::get( 'chinh-sua/{year}', 'Infrastructure@create' )->name( 'university.infrastructure.create' );
	Route::post( 'chinh-sua/{year}', 'Infrastructure@postCreate' )->name( 'university.infrastructure.postCreate' );
//
	Route::post( 'chinh-sua-ktx/{year}', 'Infrastructure@updateKTX' )->name( 'university.infrastructure.updateKTX' );
//
//	Route::get( 'xoa/{id}', 'Infrastructure@delete' )->name( 'university.infrastructure.delete' );
} );