<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receptionist;
use App\Rules\ageValidation;
use App\Rules\nicValidation;
use Illuminate\Support\Facades\Hash;
use App\SystemUser;
use Mail;
use App\Mail\welcome;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receps=Receptionist::all();
        return view('admin_panel.index',['receptionists'=>$receps]);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.add');
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
            'email'=>'required|unique:system_users|email',
            'name'=>'required|string|min:2',
            'nic' => ['required','unique:receptionists',new nicValidation],
            'dob' => ['required',new ageValidation],
            //'nic' => 'required|string|min:10|regex:/^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/',
            //'dob' => 'required|before:-18 years|after:65 years',
            'address' => 'required',
            'tpno' => 'required|unique:receptionists|regex:/^[0]{1}[0-9]{9}$/',


        ]);
        $systemUser = new SystemUser;
        $recepnew =new Receptionist;
        $recepnew ->name =$request ->name;
        //$recepnew ->email =$request ->email;
        $recepnew ->nic =$request ->nic;
        $recepnew ->dob =$request ->dob;
        $recepnew ->address =$request ->address;
        $recepnew ->tpno =$request ->tpno;
        $recepnew -> role_id =3;
        $recepnew ->save();

        $receptionistID = $recepnew->id;
        $recepRoleID = $recepnew->role_id;
        $nic = $recepnew -> nic;
        $systemUser -> id = $receptionistID;
        $systemUser -> email =$request ->email;
        $systemUser -> username= $request ->email;
        $systemUser -> password = Hash::make($nic);
        $systemUser -> role_id =$recepRoleID;
        $systemUser->save();

        $thisUser = SystemUser::findOrFail($systemUser->id);
        $this->sendMail($thisUser);

        return redirect('receptionist')->with('success','Staff Created');

    }

    //function to send email
    public function sendMail($thisUser){
        Mail::to($thisUser['email'])->send(new welcome($thisUser));

    }//sending email

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
        $recepfind = Receptionist::findOrFail($id);
        return view('admin_panel.edit',['receptionist'=>$recepfind]);
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
            'email'=>'required|unique:receptionists|email',
            'name'=>'required|string|min:2',
            'nic' => ['required','unique:receptionists',new nicValidation],
            'dob' => ['required',new ageValidation],
            //'nic' => 'required|string|min:10|regex:/^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/',
            //'dob' => 'required|before:-18 years|after:65 years',
            'address' => 'required',
            'tpno' => 'required|unique:receptionists|regex:/^[0]{1}[0-9]{9}$/',


        ]);

        $recepnew =Receptionist::findOrFail($id);
        $recepnew ->name =$request ->name;
        $recepnew ->email =$request ->email;
        $recepnew ->nic =$request ->nic;
        $recepnew ->dob =$request ->dob;
        $recepnew ->address =$request ->address;
        $recepnew ->tpno =$request ->tpno;
        $recepnew ->save();
        return redirect('receptionist')->with('success','Staff Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recepfind=Receptionist::findOrFail($id);
        $recepfind->delete();
        return redirect('/receptionist');
    }
}
