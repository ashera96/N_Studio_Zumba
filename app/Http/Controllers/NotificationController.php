<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Session;
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
use Illuminate\Notifications\Notifiable;

class NotificationController extends Controller
{
    public function index(){
        return view('admin_panel.create_notifications');
    }

   public function store_health_tips(Request $request){ //function to store healthtips in th db
        $this->validate($request, [
            'healthtips' => 'required|max:191',
        ]);

        $health_tip = new HealthTip();
        $health_tip ->healthtips = $request->healthtips;

        if($health_tip ->save()){
            $current_user = Auth::user();
            //check 4 d sysUser's role_id==2 for send to customers
            $system_user = SystemUser::where("role_id","==",$current_user->role_id)->orWhere("role_id",2)->get();

            Notification::send($system_user, new AddHealthTip($health_tip));
            Session::flash('msght', 'Health Tip Sent Successfully!');
        }
       return redirect()->back();
   }

   public function store_general_news(Request $request){   //function to store general_news in db
       $this->validate($request, [
           'general' => 'required|max:191',
       ]);

        $general_notification = new GeneralNews();
        $general_notification ->general_news = $request->general;


       if($general_notification ->save()){
           $current_user = Auth::user();
           //check 4 d sysUser's role_id==2 for send to customers
           $system_user = SystemUser::where("role_id","==",$current_user->role_id)->orWhere("role_id",2)->get();
           Notification::send($system_user, new AddGeneralNews($general_notification));
           Session::flash('msgn', 'General Notification Sent Successfully!');
       }

       return redirect()->back();
   }

}
