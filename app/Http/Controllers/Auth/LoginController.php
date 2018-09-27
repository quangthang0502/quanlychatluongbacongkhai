<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
		return view('login.login', ['title' => 'Đăng nhập']);
    }

    public function login( LoginRequest $request ) {
	    $input = $request->only( [ 'email', 'password' ] );

	    $user = User::where( [
		    'email' => $input['email']
	    ] )->first();

	    if ( $user && Hash::check( $input['password'], $user->password ) ) {
		    Auth::login( $user, true );
		    $request->session()->put( 'userData', $user );

		    return redirect()->route( 'dashboard' );
	    } else {
		    $errors = new MessageBag( [ 'loginError' => 'Tài khoản hoặc mật khẩu không đúng' ] );

		    return redirect()->back()->withInput()->withErrors( $errors );
	    }
    }

	public function logout( Request $request ) {
		Auth::logout();
		$request->session()->forget( 'userData' );

		return redirect()->route('login');
	}
}
