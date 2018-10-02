<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    // Method to login with email or username
    public function username(){
        $loginType = request()->input('username');
        $this -> username = filter_var($loginType,FILTER_VALIDATE_EMAIL)?'email':'username';
        request()->merge([$this->username => $loginType]);

        return property_exists($this,'username') ? $this->username : 'email';
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }

        // If unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
