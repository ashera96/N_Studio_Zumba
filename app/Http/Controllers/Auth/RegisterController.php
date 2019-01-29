<?php

namespace App\Http\Controllers\Auth;
use App\MedicalIssue;
use Mail;
use App\Mail\welcomeUser;
use App\Rules\ageValidation;
use App\Rules\nicValidation;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\SystemUser;


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
            'name' => 'required|string|max:191',
            'username' => 'required|string|min:4|unique:system_users',
            'nic' => ['required','unique:users',new nicValidation],//custom
            'dob' => ['required',new ageValidation], //custom
            'address' => 'required',
            'contactno' => 'required|unique:users|regex:/^[0]{1}[0-9]{9}$/',
            'email' => 'required|string|email|max:191|unique:system_users',
            'password' => 'required|string|min:6|confirmed',
            'medicissue'=>'max:191',
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
        //put the data in to the system_users table
        $systemuser = SystemUser::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' =>2,
            'status' => true, //set newly registered user's status as true
        ]);

        //put the data in to the users table
        $user = User::create([
            'name' => $data['name'],
            'nic' => $data['nic'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'contactno' => $data['contactno'],
            'id' => $systemuser->id,
        ]);

        //put the data in to medical_issues table
        $medicalissue = MedicalIssue::create([
            'id' => $systemuser->id,
            'medicissue' => $data['medicissue'],
        ]);

        $thisUser = SystemUser::findOrFail($systemuser->id); //select the newly registered user
        $this->sendMail($thisUser); //send email(welcome to the system)

        return $systemuser;
    }

        //function to send email when a user is registered,to user's email address
        public function sendMail($thisUser){ //function to send an email after successful registration
        Mail::to($thisUser['email'])->send(new welcomeUser($thisUser));
    }

}//RegisterController class
