<?php

namespace App\Http\Controllers\Auth;
use Mail;
use App\Mail\verifyEmail;
use App\Rules\ageValidation;
use App\Rules\nicValidation;
use App\User;
use App\SystemUser;
use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'username' => 'required|string|min:4|unique:system_users',
            'nic' => ['required','unique:users',new nicValidation],//custom
            'dob' => ['required',new ageValidation], //custom
            'address' => 'required',
            'contactno' => 'required|unique:users|regex:/^[0]{1}[0-9]{9}$/',
            'email' => 'required|string|email|max:255|unique:system_users',
            'password' => 'required|string|min:6|confirmed',
            'medicissue'=>'max:255',
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
            'nic' => $data['nic'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'contactno' => $data['contactno'],

            //'email' => $data['email'],
            //'password' => Hash::make($data['password']),
            //'username' => $data['username'],

            'role_id'=>1,
            'medicissue' => $data['medicissue'],

        ]);

        $userID = $user -> id;
        $roleID = $user -> role_id;

        $systemuser = SystemUser::create([
            'id' => $userID,
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $roleID,
        ]);


        $thisUser = SystemUser::findOrFail($systemuser->id);
        $this->sendMail($thisUser);

        return $systemuser;
        }

    public function sendMail($thisUser){ //function to send an email after successful registration
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));

    }
}//RegisterController class
