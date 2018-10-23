<?php

namespace App\Http\Controllers;

use App\Models\GioiThieu;
use App\Models\University;
use App\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {

	public function dashboard() {

		if ( is_null( session()->get( 'userData' ) ) ) {
			return redirect()->route( 'logout' );
		}
		/** @var User $user */
		$user = Auth::user();

		if ( $user->type == 3 || $user->type == 4 ) {
			$university = University::find( $user->university_id );

			return redirect()->route( 'dashboard.university', $university->slug );
		}
		$title = 'Dashboard';

		$universities = University::all();

		return view( 'admin.' . __FUNCTION__, compact( 'title' , 'universities') );
	}

	public function dashboardUniversity( $slug ) {
		if ( is_null( session()->get( 'userData' ) ) ) {
			return redirect()->route( 'logout' );
		}
		$university = University::findBySlug( $slug );

		$title = $university->vi_ten;

		$gioiThieu = GioiThieu::find( $university->gioi_thieu_id );

		return view( 'dashboard.dashboard', compact( 'title', 'university', 'slug', 'gioiThieu' ) );
	}
}
