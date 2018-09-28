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