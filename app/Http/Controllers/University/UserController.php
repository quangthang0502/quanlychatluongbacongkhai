<?php

namespace App\Http\Controllers\University;

use App\Http\Requests\CreateUser;
use App\Http\Requests\EditUser;
use App\Models\University;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
	protected $_user;

	const VIEW_PATH = 'user.';

	public function __construct( User $user ) {
		$this->_user = $user;
	}

	public function index( $slug ) {
		/** @var User $manager */
		$manager = Auth::user();
		if ( $manager->type != 0 && $manager->type != 3 ) {
			return redirect()->route( 'dashboard' );
		}
		$university = University::findBySlug( $slug );

		$users = User::findUserBySomeFeilds( $university->id, 3 );
		$title = 'Quản lý tài khoản trường ' . $university->vi_ten;

		return view( self::VIEW_PATH . __FUNCTION__, compact( 'title', 'users', 'slug' ) );
	}

	public function create( $slug ) {
		/** @var User $manager */
		$manager = Auth::user();
		if ( $manager->type != 0 && $manager->type != 3 ) {
			return redirect()->route( 'dashboard' );
		}

		$university = University::findBySlug( $slug );

		$title = 'Tạo tài khoản trường ' . $university->vi_ten;

		return view( self::VIEW_PATH . __FUNCTION__, compact( 'title', 'slug', 'university' ) );
	}

	public function postCreate( CreateUser $request ) {
		$result = $request->only( [
			'name',
			'email',
			'type',
			'password',
		] );

		$result['password']      = bcrypt( $result['password'] );
		$result['role']          = json_encode( [] );
		$result['university_id'] = $request['school_id'];
		$this->_user->create( $result );

		$slug = University::find( $request['school_id'] )->slug;

		return redirect()->route( 'university.user.index', $slug )->with( 'success', 'Tạo mới thành công' );

	}

	public function edit( $slug, $id ) {
		$user       = User::find( $id );
		$title      = 'Chỉnh sửa tài khoản ' . $user->name;
		$manager    = Auth::user();
		$university = University::find( $manager->university_id );
		$name       = $university->vi_ten;

		return view( self::VIEW_PATH . __FUNCTION__, compact( 'title', 'user', 'name', 'slug' ) );
	}

	public function postEdit( $slug, $id, EditUser $request ) {
		$user = $this->_user->find( $id );

		$result = $request->only( [
			'name',
			'email',
			'type',
		] );

		if ( $request['password'] != null && $request['password'] != '' ) {
			$result['password'] = $request['password'];
		}

		$user->update( $result );

		return back()->with( 'success', 'Chỉnh sửa thành công' );
	}

	public function delete( $slug, $id ) {
		$this->_user->destroy( $id );

		return back()->with( 'success', 'Xóa tài khoản thành công' );
	}
}
