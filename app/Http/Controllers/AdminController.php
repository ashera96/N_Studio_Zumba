<?php

namespace App\Http\Controllers;

use App\SystemUser;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //
    /*public function __construct()
    {
        $this->middleware('admin');
    }
*/
  /*  public function index(){
        $users=SystemUser::all();
        return view('admin_panel.dashboard',compact('users'));
   }*/

    public function show_dashboard()
    {
        $users=SystemUser::all();
        return view('admin_panel.dashboard',compact('users'));
       // return view('admin_panel.dashboard',compact('users'));


    }
    public function show_gallery()
    {
        return view('admin_panel.admin_gallery');
    }
}
