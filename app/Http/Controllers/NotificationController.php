<?php

namespace App\Http\Controllers;

use App\HealthTip;
use App\Notifications\AddHealthTip;
use App\SystemUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;

class NotificationController extends Controller
{
    public function index(){
        return view('admin_panel.create_notifications');
    }

   public function store_health_tips(Request $request){
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

}
