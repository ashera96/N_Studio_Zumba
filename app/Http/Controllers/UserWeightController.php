<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Weights;

class UserWeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new  =User::all();//->where('role_id', '=', '1');
        return view('admin_panel.weight_index',['users'=>$new]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userfind = Weights::findOrFail($id);
        return view('admin_panel.weight_view',['weights'=>$userfind]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
