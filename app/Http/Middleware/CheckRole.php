<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 *
	 * @return mixed
	 */
	public function handle( $request, Closure $next ) {
		$routeName = $request->route()->getName();

		/** @var User $user */
		$user = Auth::user();
		if ( $user->type == 0 ) {
			return $next( $request );
		} else if ( $user->type == 2 ) {
			$check = 'admin';
		} else {
			$check = 'university';
		}

		if ( strpos( $routeName, $check ) === false ) {
			return redirect()->route( 'dashboard' );
		}

		return $next( $request );
	}
}
