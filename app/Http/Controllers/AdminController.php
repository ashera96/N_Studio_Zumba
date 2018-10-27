<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    /*public function __construct()
    {
        $this->middleware('admin');
    }
*/
    public function show_dashboard()
    {
        return view('admin_panel.dashboard');
    }
}
