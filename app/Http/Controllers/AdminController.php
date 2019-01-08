<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\ScheduleCount;
use App\SystemUser;
use App\User;
use Illuminate\Http\Request;
use DB;


class AdminController extends Controller
{
    //
    /*public function __construct()
    {
        $this->middleware('admin');
    }
*/
  /*  public function index(){
        $users=SystemUser::all();
        return view('admin_panel.dashboard',compact('users'));
   }*/

    public function show_dashboard()
    {
        $users=SystemUser::all();

        $custs=SystemUser::all()->where('status','=',1);

      //  $ncusts=SystemUser::all()->where('status','=',0)->where('role_id','=','2');

        return view('admin_panel.dashboard',compact('users'),compact('custs'));
       // return view('admin_panel.dashboard',compact('users'));




    }
    public function show_gallery()
    {
        return view('admin_panel.admin_gallery');
    }

    public function show_schedules()
    {
        $schedule_monday = Schedule::all()->where('day','=','Monday');
        $schedule_tuesday = Schedule::all()->where('day','=','Tuesday');
        $schedule_wednesday = Schedule::all()->where('day','=','Wednesday');
        $schedule_thursday = Schedule::all()->where('day','=','Thursday');
        $schedule_friday = Schedule::all()->where('day','=','Friday');
        $schedule_saturday = Schedule::all()->where('day','=','Saturday');
        $schedule_sunday = Schedule::all()->where('day','=','Sunday');

        $schedule_limit = Schedule::select('client_limit')->where('id',1)->first();
        $schedule_monday1_count = ScheduleCount::select('counter')->where('schedule_id',1)->first();
        $schedule_monday2_count = ScheduleCount::select('counter')->where('schedule_id',2)->first();
        $schedule_tuesday1_count = ScheduleCount::select('counter')->where('schedule_id',3)->first();
        $schedule_tuesday2_count = ScheduleCount::select('counter')->where('schedule_id',4)->first();
        $schedule_wednesday1_count = ScheduleCount::select('counter')->where('schedule_id',5)->first();
        $schedule_wednesday2_count = ScheduleCount::select('counter')->where('schedule_id',6)->first();
        $schedule_thursday1_count = ScheduleCount::select('counter')->where('schedule_id',7)->first();
        $schedule_thursday2_count = ScheduleCount::select('counter')->where('schedule_id',8)->first();
        $schedule_friday1_count = ScheduleCount::select('counter')->where('schedule_id',9)->first();
        $schedule_friday2_count = ScheduleCount::select('counter')->where('schedule_id',10)->first();
        $schedule_saturday_count = ScheduleCount::select('counter')->where('schedule_id',11)->first();
        $schedule_sunday_count = ScheduleCount::select('counter')->where('schedule_id',12)->first();

        $users1 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',1)
            ->get();

        $users11 = [];
        foreach($users1 as $u) {
            array_push($users11, $u);
        }



            return view('admin_panel.class_schedules', compact('schedule_monday', 'schedule_tuesday', 'schedule_wednesday', 'schedule_thursday', 'schedule_friday', 'schedule_saturday', 'schedule_sunday',
                'schedule_monday1_count','schedule_limit',
                'schedule_monday2_count','schedule_tuesday1_count',
                'schedule_tuesday2_count','schedule_wednesday1_count',
                'schedule_wednesday2_count','schedule_thursday1_count',
                'schedule_thursday2_count','schedule_friday1_count',
                'schedule_friday2_count','schedule_saturday_count',
                'schedule_sunday_count', 'users11'
            ));
    }


}
