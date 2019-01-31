<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\SystemUser;
use DB;

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
        //  $users=User::all();
        // return view('home',compact('users'));
        //return view(Auth::user()->role->name);


        $role_id = Auth::user()->role->id;


        if ($role_id == '2') {
            $posts = Post::orderBy('updated_at','DESC')->paginate(2); //display posts in the customer's home page
            //$posts = Post::all();

            $weight = DB::table('weights')->where('id', '=',Auth::user()->id)->orderBy('year','ASC')->limit(5)->get();

            return view('customer_pages.home')->with('posts', $posts)->withDetails($weight);
        }
        elseif ($role_id == '1') {
            // return view('home',compact('users'));
            $users=SystemUser::all();
            $custs=SystemUser::all()->where('status','=',1);
            return view('admin_panel.dashboard',compact('users'),compact('custs'));
        }
        elseif ($role_id == '3') {
            $users=SystemUser::all();
            $custs=SystemUser::all()->where('status','=',1);
            return view('recep_panel.recep_dashboard',compact('users'),compact('custs'));
        }
        else {
            return view('index');

        }
    }


    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $posts = DB::table('posts')->paginate(2);
            try {
                return view('customer_pages.pagination_data', compact('posts'))->render();
            } catch (\Throwable $e) {

            }
        }
    }

}
