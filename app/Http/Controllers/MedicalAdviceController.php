<?php

namespace App\Http\Controllers;

use App\MedicalAdvice;
use App\MedicalIssue;
use App\Notifications\AddMediAdvice;
use App\SystemUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Facades\Session;
use Notification;

class MedicalAdviceController extends Controller
{
    public function index(){ //return the details of users who are having medical issues
        $user=DB::table('medical_issues')
            ->join('system_users','medical_issues.id','=','system_users.id')
            ->select('system_users.*','medical_issues.*')
            ->where('medical_issues.medicissue','!=','null')
            ->orderBy('system_users.created_at','DESC')
            ->paginate(5);
        return view('admin_panel.send_medical_advices',['medical_issues'=>$user]);
    }

    public function store(Request $request){ //store the medical advice to db
        $this->validate($request,[
            'advice'=>'required|string',
        ]);

            $medical_advice = new MedicalAdvice;
            $medical_advice->advice = $request->advice;
            $medical_advice->save();

        $data = [
            'advice'=>$request->advice,
            'email_data'=>$request->email_data,
            'id_data'=>$request->id_data,
        ];

        //send the medical advice as a email
        Mail::send('email.medAdvice', $data, function ($med_advice) use ($request, $data) {

                $med_advice->to($data['email_data']);
                $med_advice->subject('Medical Advice For You');

                Session::flash('msg1', 'Sent Successfully!'); //print flas msg after successfully send
            });

        //$user = SystemUser::where("id","==",Auth::user()->id)->orWhere("id",$data['id_data'])->first();//select the specific user by checking the id
        $user = SystemUser::where("id",$data['id_data'])->first();//select the specific user by checking the id
        Notification::send($user, new AddMediAdvice($medical_advice)); //send as a push notification

       return redirect()->back();
    }
}
