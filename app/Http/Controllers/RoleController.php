<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Router;
use Symfony\Component\Routing\Annotation\Route;


class RoleController extends Controller {
	//
	/**
	 * @param $slug
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
	 */
	public function index( $slug, Request $request ) {
		$title = 'Phân quyền người dùng';

		/** @var User $manager */
		$manager = Auth::user();
		if ( $manager->type != 0 && $manager->type != 3 ) {
			return redirect()->route( 'dashboard' );
		}
		$university = University::findBySlug( $slug );

		$users = User::findUserBySomeFeilds( $university->id, 3 );

		$role = [
			'user',
//			'thongke',
//			'dashboard',
			'intro',
			'leaders',
			'training',
			'teacher',
			'student',
			'sv',
			'research',
			'infrastructure',
			'role'
		];

		return view( 'role.' . __FUNCTION__, compact( 'slug', 'title', 'users', 'role' ) );
	}

	public function post( Request $request ) {
		$request = $request->only( [
			'userId',
			'role',
			'action'
		] );

		$user = User::find( $request['userId'] );

		if ( $request['action'] == 'true' ) {
			$role = $user->role;
			if ( $role == null || $role == '' ) {
				$role       = [ $request['role'] ];
				$role       = array_unique( $role );
				$user->role = json_encode( $role );
			} else {
				$role       = json_decode( $role );
				$role[]     = $request['role'];
				$role       = array_unique( $role );
				$user->role = json_encode( $role );
			}
		} else {
			$role = $user->role;
			$role = json_decode( $role );
			if ( ( $key = array_search( $request['role'], $role ) ) !== false ) {
				unset( $role[ $key ] );
				$role       = array_unique( $role );
				$role       = array_values( $role );
				$user->role = json_encode( $role );
			}
		}
		$user->save();

		return response()->json( [ 'success' => 'Chỉnh sửa thành công' ], 200 );
	}
}
