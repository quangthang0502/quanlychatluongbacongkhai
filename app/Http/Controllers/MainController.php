<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {

	public function dashboard() {

		/** @var User $user */
		$user = Auth::user();

		if ( $user->type == 3 || $user->type == 4 ) {
			$university = University::find( $user->university_id );

			return redirect()->route( 'dashboard.university', $university->slug );
		}
		$title = 'Dashboard';

		return view( 'admin.' . __FUNCTION__, compact( 'title' ) );
	}

	public function dashboardUniversity( $slug ) {
		$university = University::findBySlug( $slug );

		$title = $university->vi_ten;

		return view( 'dashboard.dashboard', compact( 'title', 'university' ,'slug') );
	}
}
