<?php

namespace App\Http\Controllers;

use App\SystemUser;
use Illuminate\Http\Request;
use App\User;
use App\Rules\ageValidation;
use App\Rules\nicValidation;
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

        if('system_users.id'==1) {
            return view('admin_panel.user_index', ['users' => $new]);
        }
        else{
            return view('recep_panel.user_index', ['users' => $new]);
        }
    }

    /*public function search(Request $request){
        $searchkey = $request -> get('search');
        $new = User::where('id', 'like', '%',$searchkey,'%');
        return view('admin_panel.user_index',['users'=>$new]);
    }*/

    public function UpdateCustomerActive($id){
        $user=SystemUser::find($id);
        $user->status=1;
        $user->save();
        return redirect()->back();
    }
    public function UpdateCustomerNotActive($id){
        $user=SystemUser::find($id);
        $user->status=0;
        $user->save();
        return redirect()->back();
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
        /*$this->validate($request,[
            'id' => 'required',
            'name'=>'required|string|min:2',
            'dob' => ['required',new ageValidation],
            'nic' => ['required','unique:users',new nicValidation],

        ]);

        $cusfind =User::find($id);
        $cusfind ->id =$request ->get('id');
        $cusfind ->name =$request ->get('name');
        $cusfind ->nic =$request ->get('nic');
        $cusfind ->dob =$request ->get('dob');
        $cusfind ->save();
        return redirect('/admin/customers')->with('success','Customer Updated');*/

        $this->validate($request,[
            //'id' => 'required',
            //'email'=>'required|email',
            'name'=>'required|string',//|min:2',
            'nic' => ['required',new nicValidation],
            'dob' => ['required',new ageValidation],
            //'nic' => 'required|string|min:10|regex:/^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/',
            'address' => 'required',
            //'tpno' => 'required|regex:/^[0]{1}[0-9]{9}$/',
        ]);

        $cusfind =User::findOrFail($id);
        //$system_users = SystemUser::findOrFail($id);
        //$cusfind ->id = $request ->id;
        $cusfind ->name =$request ->name;
        //$recepnew ->email =$request ->email;
        //$system_users ->email =$request ->email;
        $cusfind ->nic =$request ->nic;
        $cusfind ->dob =$request ->dob;
        $cusfind ->address =$request ->address;
        //$cusfind ->tpno =$request ->tpno;
        //$system_users ->status=true;
        $cusfind ->save();
        //$system_users ->save();

        return redirect('admin/customers')->with('success','Customer Updated');


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
