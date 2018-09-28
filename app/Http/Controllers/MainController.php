<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {

	public function dashboard() {

		$user = Auth::user();

		if ( $user->type == 0 ) {
			$dirName = 'admin.';
		} else {
			$dirName = 'dashboard.';
		}
		$title = 'Dashboard';

		return view( $dirName . __FUNCTION__, compact( 'title' ) );
	}
}
