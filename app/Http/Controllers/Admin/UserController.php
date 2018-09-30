<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateUser;
use App\Univercity;
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

	public function create(){
		$title = 'Tạo tài khoản mới';

		return view(self::VIEW_PATH.__FUNCTION__, compact('title'));
	}

	public function postCreate(CreateUser $request){
		$result =  $request->only([
			'name',
			'email',
			'type',
			'password',
		]);
		$result['password'] = bcrypt($result['password']);
		$result['role'] = '';
		$schoolName = $request['school_name'];

		if ($result['type'] == 2){
			$this->_user->create($result);
			return redirect()->route('admin.user.index')->with('success', 'Tạo mới thành công');
		} else {
			$univercityID = Univercity::create([
				'vi_ten' => $schoolName,
				'slug' => str_slug($schoolName)
			])->id;
			$result['university_id'] = $univercityID;
			$this->_user->create($result);
			return redirect()->route('admin.user.index')->with('success', 'Tạo mới thành công');
		}
	}
}
