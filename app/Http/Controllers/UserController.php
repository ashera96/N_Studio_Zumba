<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $new  =User::all(); //->where('status', '=', '1');
       // return view('admin_panel.user_index',['users'=>$new]);
        $new=DB::table('users')
            ->join('system_users','users.id','=','system_users.id')
            ->select('system_users.*','users.*')
            ->get();
        return view('admin_panel.user_index',['users'=>$new]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cusfind = User::findOrFail($id);
        return view('admin_panel.user_edit',['user'=>$cusfind]);

        /*$cusfind = User::find($id);
        return view('admin_panel.user_edit',compact('cusfind','id')); */
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
        $this->validate($request,[
            'id' => 'required',
            'name'=>'required',
            'username'=>'required',

        ]);

        $cusfind =User::find($id);
        $cusfind ->id =$request ->get('id');
        $cusfind ->name =$request ->get('name');
        $cusfind ->username =$request ->get('username');
        $cusfind ->nic =$request ->get('nic');
        $cusfind ->email =$request ->get('email');
        $cusfind ->status =$request ->get('status');
        $cusfind ->save();
        return redirect('/admin/customers')->with('success','Customer Updated');
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
