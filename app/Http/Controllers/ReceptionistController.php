<?php

namespace App\Http\Controllers;

use App\Rules\ageOfReceptionistValidation;
use Illuminate\Http\Request;
use App\Receptionist;
use App\Rules\ageValidation;
use App\Rules\nicValidation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\welcome;
use App\SystemUser;
use DB;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$receps=Receptionist::all();
        //return view('admin_panel.index',['receptionists'=>$receps]);
        $receps =DB::table('receptionists')
            ->join('system_users','receptionists.id','=','system_users.id')
            ->select('system_users.*','receptionists.*')
            ->get();
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
            'dob' => ['required',new ageOfReceptionistValidation],
            //'nic' => 'required|string|min:10|regex:/^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/',
            'address' => 'required',
            'tpno' => 'required|regex:/^[0]{1}[0-9]{9}$/',
        ]);

        $recepnew =new Receptionist;
        $system_users = new SystemUser;

        $recepnew ->name =$request ->name;
        $system_users ->email =$request ->email;
       // $recepnew ->email =$request ->email;
        $recepnew ->nic =$request ->nic;
        $recepnew ->dob =$request ->dob;
        $recepnew ->address =$request ->address;
        $recepnew ->tpno =$request ->tpno;
        $email = $system_users -> email;
        $nic = $recepnew -> nic;
        $system_users -> username= $email;
        $system_users -> password = Hash::make($nic);
        $system_users -> role_id =3;
        $system_users -> status = true;

        $system_users ->save();
        $recepnew -> id = $system_users->id;
        $recepnew ->save();
        $thisUser = SystemUser::findOrFail($system_users->id);
        $this->sendMail($thisUser);

        Session::flash('msgr1', 'Receptionist successfully created!'); //print flash msg after successfully created

        return redirect('admin/receptionist');
    }

    //function to send email
    public function sendMail($thisUser){
        Mail::to($thisUser['email'])->send(new welcome($thisUser));

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
        $recepfind = Receptionist::findOrFail($id);
        return view('admin_panel.edit',['receptionist'=>$recepfind]);

        $recepfind = SystemUser::findOrFail($id);
        return view('admin_panel.edit',['system_users'=>$recepfind]);

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
            'email'=>'required|email',
            'name'=>'required|string|min:2',
            'nic' => ['required',new nicValidation],
            'dob' => ['required',new ageOfReceptionistValidation],
            //'nic' => 'required|string|min:10|regex:/^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/',
            'address' => 'required',
            'tpno' => 'required|regex:/^[0]{1}[0-9]{9}$/',
        ]);

        $recepnew =Receptionist::findOrFail($id);
        $system_users = SystemUser::findOrFail($id);
        $recepnew ->name =$request ->name;
        //$recepnew ->email =$request ->email;
        $system_users ->email =$request ->email;
        $recepnew ->nic =$request ->nic;
        $recepnew ->dob =$request ->dob;
        $recepnew ->address =$request ->address;
        $recepnew ->tpno =$request ->tpno;
        $system_users ->status=true;
        $recepnew ->save();
        $system_users ->save();

        Session::flash('msgr2', 'Receptionist successfully updated!'); //print flash msg after successfully updated

        return redirect('admin/receptionist');

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
        //receptionists table is reffering the primary key of the system_users table as a foreign key.
        //so after deleting a receptionist, data in both tables should be removed.
        //but need to discuss further about this destroy method !!!!!!!!!!!!!!
        $systemuser = SystemUser::findOrFail($id);
        $systemuser->delete();

        Session::flash('msgr3', 'Receptionist successfully deleted!'); //print flash msg after successfully updated

        return redirect('admin/receptionist');
    }
}
