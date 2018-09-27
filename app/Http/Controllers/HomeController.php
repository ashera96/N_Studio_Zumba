<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()   //controlling user roles
    {
        //return view('home');
        //return view(Auth::user()->role->name);
        $role = Auth::user()->role->name;

        if($role == 'customer'){
            return view('home');
        }
        elseif($role == 'admin'){
            return view('admin_panel.dashboard');
        }
        elseif($role == 'receptionist'){
            return view('receptionist_pages.dashboard');
        }else{
            return view('index');
        }
    }
}



