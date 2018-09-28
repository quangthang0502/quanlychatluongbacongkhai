<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
	protected $_user;
	const VIEW_PATH = 'admin.user.';

	public function __construct( User $user ) {
		$this->_user = $user;
	}

	public function index() {
		$manager = Auth::user();

		$users = User::findUserBySomeFeilds($manager->university_id, $manager->type);
		$title = 'Quản lý user';
		return view( self::VIEW_PATH . __FUNCTION__, compact( 'title' , 'users') );
	}
}
