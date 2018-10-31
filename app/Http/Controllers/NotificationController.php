<?php

namespace App\Http\Controllers;

use Mail;
use App\GeneralNews;
use App\HealthTip;
use App\Notifications\AddHealthTip;
use App\Notifications\AddGeneralNews;
use App\SystemUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;
use App\Mail\generalNewsNotification;

class NotificationController extends Controller
{
    public function index(){
        return view('admin_panel.create_notifications');
    }

   public function store_health_tips(Request $request){ //function to store healthtips in th db
        $this->validate($request, [
            'healthtips' => 'required',
        ]);

        $health_tip = new HealthTip();
        $health_tip ->healthtips = $request->healthtips;

        if($health_tip ->save()){
            $current_user = Auth::user();
            //check 4 d sysUser's role_id==2 for send to customers
            $system_user = SystemUser::where("role_id","==",$current_user->role_id)->orWhere("role_id",2)->get();

            Notification::send($system_user, new AddHealthTip($health_tip));
        }
       return redirect()->back();
   }

   public function store_general_news(Request $request){   //function to store general_news in db
       $this->validate($request, [
           'general' => 'required',
       ]);

        $general_notification = new GeneralNews();
        $general_notification ->general_news = $request->general;


       if($general_notification ->save()){
           $current_user = Auth::user();
           //check 4 d sysUser's role_id==2 for send to customers
           $system_user = SystemUser::where("role_id","==",$current_user->role_id)->orWhere("role_id",2)->get();

           Notification::send($system_user, new AddGeneralNews($general_notification));

           $data = [
               'general_news'=>$request->general,
           ];
           Mail::send('email.generalNews',$data,function ($general_news) use ($data){
               $current_user = Auth::user();

               $system_user = SystemUser::where("role_id","==",$current_user->role_id)->orWhere("role_id",2)->first();

               $general_news -> to($system_user->email);
           });
       }

       return redirect()->back();
   }

    /*public function sendGeneralMail($system_user){ //function to send an email
        Mail::to($system_user)->send(new generalNewsNotification($system_user));
    }*/


}
