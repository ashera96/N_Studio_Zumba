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
        $role_id = Auth::user()->role->id;
        if($role_id == '2'){
            return view('customer_pages.home');
        }
        elseif($role_id == '1'){
            return view('admin_panel.dashboard');
        }
        elseif($role_id == '3'){
            return view('receptionist_pages.dashboard');
        }
        else{
            return view('index');
        }
    }

    public function error_page(){
        return view('errors.404page_not_found');
    }

}



