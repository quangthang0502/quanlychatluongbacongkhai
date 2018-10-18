<?php
/**
 * Created by PhpStorm.
 * User: NguyenSy
 * Date: 9/28/2018
 * Time: 10:40 PM
 */

function getUser(){
	return session()->get( 'userData' );
}
/*
 * showNotification
 */

function showNotification(){
	if (session()->has('success')){
		return "demo.showNotification('top','right', 'success', '".session()->get('success')."');";
	}
	if (session()->has('success')){
		return "demo.showNotification('top','right', 'success', '".session()->get('success')."');";
	}
}

/*
|--------------------------------------------------------------------------
| Detect Active Route
|--------------------------------------------------------------------------
|
| Compare given route with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function isActiveRoute($route, $output = "active")
{
	if (Route::currentRouteName() == $route) return $output;
}

/*
|--------------------------------------------------------------------------
| Detect Active Routes
|--------------------------------------------------------------------------
|
| Compare given routes with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function areActiveRoutes(Array $routes, $output = "active")
{
	foreach ($routes as $route)
	{
		if (Route::currentRouteName() == $route) return $output;
	}

}

function getNameTeacher($id){
	$data = [
		1 => 'Giáo sư, Viện sĩ',
		2 => 'Phó Giáo sư',
		3 => 'Tiến sĩ khoa học ',
		4 => 'Tiến sĩ',
		5 => 'Thạc sĩ',
		6 => 'Đại học',
		7 => 'Cao đẳng',
		8 => 'Trung cấp',
		9 => 'Trình độ khác',
	];
	return $data[$id];
}