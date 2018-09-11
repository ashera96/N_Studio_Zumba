<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\SystemUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\nicValidation;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //validating fields
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:4|unique:users',
            'nic' => ['required',new nicValidation],//custom
            //'nic' => 'required|string|min:10|regex:/^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/',
            'dob' => 'required|before:-18 years|after:65 years',
            'address' => 'required',
            'contactno' => 'required|regex:/^[0]{1}[0-9]{9}$/',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'medicissue' => 'string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    //put data into db
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'nic' => $data['nic'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'contactno' => $data['contactno'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'medicissue' => $data['medicissue'],
        ]);

        $userID = $user -> id;

        $systemuser = SystemUser::create([
            'id' => $userID, //add the on delete cascade to this*********foreign key
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;




    }
}
