<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weights;
use App\User;

class WeightController extends Controller
{
    public function index()
    {
        $new  =User::all();//->where('role_id', '=', '1');
        return view('admin_panel.weight_view',['users'=>$new]);

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
            'month' => 'required',
            'year' => 'required',
            'user_weight' => 'required',
        ]);

        $weightnew = new Weights;

        $weightnew ->id =$request ->id;
        $weightnew ->month =$request ->month;
        $weightnew->year =$request ->year;
        $weightnew ->user_weight =$request ->user_weight;

        $weightnew ->save();

        return redirect('/admin/reports')->with('success','Weight Added');
    }

    public function edit($id)
    {

        $weightfind = Weights::findOrFail($id);
        return view('admin_panel.weight_edit',['weights'=>$weightfind]);
        /*$cusfind = User::find($id);
        return view('admin_panel.user_edit',compact('cusfind','id')); */
    }

    public function destroy($id)
    {

    }
}
