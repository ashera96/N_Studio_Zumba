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

        //get the client count for each and every schedule
        $schedule_limit = Schedule::select('client_limit')->where('id',1)->first(); //get the client limit
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

        //schedule no-1
        $users1 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',1)
            ->get();

        //schedule no-2
        $users2 = DB::table('user_schedules')
                ->join('system_users','user_schedules.user_id','=','system_users.id')
                ->select('system_users.username')
                ->where('user_schedules.schedule_id','=',2)
                ->get();

        //schedule no-3
        $users3 = DB::table('user_schedules')
                ->join('system_users','user_schedules.user_id','=','system_users.id')
                ->select('system_users.username')
                ->where('user_schedules.schedule_id','=',3)
                ->get();

        //schedule no-4
        $users4 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',4)
            ->get();

        //schedule no-5
        $users5 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',5)
            ->get();

        //schedule no-6
        $users6 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',6)
            ->get();

        //schedule no-7
        $users7 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',7)
            ->get();

        //schedule no-8
        $users8 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',8)
            ->get();

        //schedule no-9
        $users9 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',9)
            ->get();

        //schedule no-10
        $users10 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',10)
            ->get();

        //schedule no-11
        $users111 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',11)
            ->get();

        //schedule no-12
        $users112 = DB::table('user_schedules')
            ->join('system_users','user_schedules.user_id','=','system_users.id')
            ->select('system_users.username')
            ->where('user_schedules.schedule_id','=',12)
            ->get();

        //schedule no-1
        $users11 = [];
        foreach($users1 as $u1){
            array_push($users11,$u1);
        }

        //schedule no-2
        $users12 = [];
        foreach($users2 as $u2){
            array_push($users12,$u2);
        }

        //schedule no-3
        $users21 = [];
        foreach($users3 as $u3){
            array_push($users21,$u3);
        }

        //schedule no-4
        $users22 = [];
        foreach($users4 as $u4){
            array_push($users22,$u4);
        }

        //schedule no-5
        $users31 = [];
        foreach($users5 as $u5){
            array_push($users31,$u5);
        }

        //schedule no-6
        $users32 = [];
        foreach($users6 as $u6){
            array_push($users32,$u6);
        }

        //schedule no-7
        $users41 = [];
        foreach($users7 as $u7){
            array_push($users41,$u7);
        }

        //schedule no-8
        $users42 = [];
        foreach($users8 as $u8){
            array_push($users42,$u8);
        }

        //schedule no-9
        $users51 = [];
        foreach($users9 as $u9){
            array_push($users51,$u9);
        }

        //schedule no-10
        $users52 = [];
        foreach($users10 as $u10){
            array_push($users52,$u10);
        }

        //schedule no-11
        $users61 = [];
        foreach($users111 as $u11){
            array_push($users61,$u11);
        }

        //schedule no-12
        $users62 = [];
        foreach($users112 as $u12){
            array_push($users62,$u12);
        }

            return view('admin_panel.class_schedules', compact('schedule_monday', 'schedule_tuesday', 'schedule_wednesday', 'schedule_thursday', 'schedule_friday', 'schedule_saturday', 'schedule_sunday',
                'schedule_monday1_count','schedule_limit',
                'schedule_monday2_count','schedule_tuesday1_count',
                'schedule_tuesday2_count','schedule_wednesday1_count',
                'schedule_wednesday2_count','schedule_thursday1_count',
                'schedule_thursday2_count','schedule_friday1_count',
                'schedule_friday2_count','schedule_saturday_count',
                'schedule_sunday_count','users11','users12','users21','users22','users31','users32',
                'users41','users42','users51','users52','users61','users62'
            ));
    }

    public function show_wait_lists(){

        $schedule_monday = Schedule::all()->where('day','=','Monday');
        $schedule_tuesday = Schedule::all()->where('day','=','Tuesday');
        $schedule_wednesday = Schedule::all()->where('day','=','Wednesday');
        $schedule_thursday = Schedule::all()->where('day','=','Thursday');
        $schedule_friday = Schedule::all()->where('day','=','Friday');
        $schedule_saturday = Schedule::all()->where('day','=','Saturday');
        $schedule_sunday = Schedule::all()->where('day','=','Sunday');


        //wait lists for each and every schedules

        //Queue scenario for monday-1
        $monday1_stack = [];

        $monday1_queue = [];

        $x1 = DB::table('waiting_queues')
            ->join('system_users','waiting_queues.user_id','=','system_users.id')
            ->select('username')->where("schedule_id", 1)->get();


        foreach ($x1 as $t1) {
            array_push($monday1_stack, $t1);
            $monday1_queue = array_reverse($monday1_stack);
        }











        return view('admin_panel.waiting_q',compact('schedule_monday','schedule_tuesday','schedule_wednesday','schedule_thursday',
            'schedule_friday','schedule_saturday','schedule_sunday','monday1_queue'






            ));
    }

}
