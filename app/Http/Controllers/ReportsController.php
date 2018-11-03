<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ReportsController extends Controller
{
    public function index()
    {
        $new  =User::all();//->where('role_id', '=', '1');
        return view('admin_panel.reports_index',['users'=>$new]);
    }

    public function create()
    {
        return view('admin_panel.add_weight');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
            'name'=>'required|string|min:2',
            'month' => 'required',
            'year' => 'required',
            'year' => 'required',
            'weight' => 'required',
        ]);

        $weightnew = new User;

        $weightnew ->id =$request ->id;
        $weightnew ->name =$request ->name;
        $weightnew ->month =$request ->month;
        $weightnew->year =$request ->year;
        $weightnew ->weight =$request ->weight;

        $weightnew ->save();

        return redirect('/admin/reports')->with('success','Weight Added');
    }
}
