<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ReportsController extends Controller
{
    public function index()
    {
        $new  =User::all();//->where('role_id', '=', '1');
        return view('admin_panel.reports',['users'=>$new]);
    }
}
