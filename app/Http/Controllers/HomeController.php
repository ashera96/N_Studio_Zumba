<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;

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
        if ($role_id == '2') {
            $posts = Post::orderBy('created_at','DESC')->get(); //display posts in the customer's home page
            //$posts = Post::all();
            return view('customer_pages.home')->with('posts', $posts);
        }
        elseif ($role_id == '1') {
            return view('admin_panel.dashboard');
        } elseif ($role_id == '3') {
            return view('receptionist_pages.dashboard');
        } else {
            return view('index');
        }
    }

}



