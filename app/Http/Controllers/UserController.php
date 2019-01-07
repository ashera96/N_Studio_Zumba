<?php

namespace App\Http\Controllers;

use App\SystemUser;
use Illuminate\Http\Request;
use App\User;
use App\Rules\ageValidation;
use App\Rules\nicValidation;
use DB;
use Illuminate\Support\Facades\Auth;





class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $new = DB::table('users')
                ->join('system_users', 'users.id', '=', 'system_users.id')
                ->select('system_users.*', 'users.*')
                //->get();
                ->paginate(2);


            return view('admin_panel.user_index', ['users' => $new]);
        }
        else if($role_id==3) {
            $new = DB::table('users')
                ->join('system_users', 'users.id', '=', 'system_users.id')
                ->select('system_users.*', 'users.*')
                //->get();
                ->paginate(2);


            return view('recep_panel.user_index', ['users' => $new]);
        }

    }


    public function index2()
    {


        $new=DB::table('users')
            ->join('system_users','users.id','=','system_users.id')
            ->select('system_users.*','users.*')
           //->get();
            ->paginate(2);

        return view('recep_panel.fees', ['users' => $new]);


    }

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

    public function PayRegFees($id){
        $user=User::find($id);
        $user->regstatus=1;
        $user->save();
        return redirect()->back();
    }
    public function RefundRegFees($id){
        $user=User::find($id);
        $user->regstatus=0;
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
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $cusfind = User::findOrFail($id);
            return view('admin_panel.user_edit', ['user' => $cusfind]);
        }
        else if($role_id==3) {
            $cusfind = User::findOrFail($id);
            return view('recep_panel.user_edit', ['user' => $cusfind]);
        }


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
        $role_id = Auth::user()->role->id;

        if($role_id==1) {
            $this->validate($request, [
                //'id' => 'required',
                //'email'=>'required|email',
                'name' => 'required|string',//|min:2',
                'nic' => ['required', new nicValidation],
                'dob' => ['required', new ageValidation],
                //'nic' => 'required|string|min:10|regex:/^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/',
                'address' => 'required',
                //'tpno' => 'required|regex:/^[0]{1}[0-9]{9}$/',
            ]);

            $cusfind = User::findOrFail($id);
            $cusfind->name = $request->name;
            //$recepnew ->email =$request ->email;
            //$system_users ->email =$request ->email;
            $cusfind->nic = $request->nic;
            $cusfind->dob = $request->dob;
            $cusfind->address = $request->address;
            //$cusfind ->tpno =$request ->tpno;
            //$system_users ->status=true;
            $cusfind->save();
            //$system_users ->save();

            return redirect('admin/customers');
        }
        else if($role_id==3) {
            $this->validate($request, [
                //'id' => 'required',
                //'email'=>'required|email',
                'name' => 'required|string',//|min:2',
                'nic' => ['required', new nicValidation],
                'dob' => ['required', new ageValidation],
                //'nic' => 'required|string|min:10|regex:/^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/',
                'address' => 'required',
                //'tpno' => 'required|regex:/^[0]{1}[0-9]{9}$/',
            ]);

            $cusfind = User::findOrFail($id);
            $cusfind->name = $request->name;
            //$recepnew ->email =$request ->email;
            //$system_users ->email =$request ->email;
            $cusfind->nic = $request->nic;
            $cusfind->dob = $request->dob;
            $cusfind->address = $request->address;
            //$cusfind ->tpno =$request ->tpno;
            //$system_users ->status=true;
            $cusfind->save();
            //$system_users ->save();

            return redirect('recep/cusprofile');
        }


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
