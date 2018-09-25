<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller {
	const DIR_NAME = 'dashboard.';
	
	public function dashboard() {
		$title = 'Dashboard';

		return view( self::DIR_NAME . __FUNCTION__, compact( 'title' ) );
	}
}
