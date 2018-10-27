<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Method to login with email or username
    //overrides the username() in AuthenticateUsers
    public function username(){
        $loginType = request()->input('username');
        $this -> username = filter_var($loginType,FILTER_VALIDATE_EMAIL)?'email':'username';
        request()->merge([$this->username => $loginType]);

        return property_exists($this,'username') ? $this->username : 'email';
    }

    //this function is checking a extra feature(status-inactive or active) when a user is attempt to logging
    //overrides the credentials() in AuthenticateUsers
    protected function credentials(Request $request) {
        return array_merge($request->only($this->username(), 'password'), ['status' => true]);
    }
}
