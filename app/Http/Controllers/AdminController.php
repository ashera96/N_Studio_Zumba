<?php

namespace App\Http\Controllers;

use App\SystemUser;
use App\User;
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

        $custs=SystemUser::all()->where('status','=',1);

      //  $ncusts=SystemUser::all()->where('status','=',0)->where('role_id','=','2');

        return view('admin_panel.dashboard',compact('users'),compact('custs'));
       // return view('admin_panel.dashboard',compact('users'));




    }
    public function show_gallery()
    {
        return view('admin_panel.admin_gallery');
    }
}
