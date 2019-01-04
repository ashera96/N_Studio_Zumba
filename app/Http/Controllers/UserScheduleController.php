<?php

namespace App\Http\Controllers;

use App\Notifications\WaitListNotice;
use App\SystemUser;
use App\WaitingQueue;
use Illuminate\Http\Request;
use App\Schedule;
use App\UserSchedule;
use Auth;
use DB;
use Notification;
use Illuminate\Support\Facades\Session;

class UserScheduleController extends Controller
{

    public function index()
    {
        $Checkbox = []; //initialized empty stack
        $current_user = Auth::user(); //current user
        $finds = UserSchedule::where("user_id", $current_user->id)->get(); //data corresponding to current user
        foreach ($finds as $find) {
            array_push($Checkbox, $find->schedule_id); //push schedule ids to the empty stack
        }
        $schedule_monday = Schedule::all()->where('day', '=', 'Monday');
        $schedule_tuesday = Schedule::all()->where('day', '=', 'Tuesday');
        $schedule_wednesday = Schedule::all()->where('day', '=', 'Wednesday');
        $schedule_thursday = Schedule::all()->where('day', '=', 'Thursday');
        $schedule_friday = Schedule::all()->where('day', '=', 'Friday');
        $schedule_saturday = Schedule::all()->where('day', '=', 'Saturday');
        $schedule_sunday = Schedule::all()->where('day', '=', 'Sunday');
        return view('customer_pages.class_schedule', compact('schedule_monday', 'schedule_tuesday', 'schedule_wednesday', 'schedule_thursday', 'schedule_friday', 'schedule_saturday', 'schedule_sunday', 'Checkbox'));
    }//index

    //---------------start of store function---------------------------------
    public function store(Request $request)
    {
        //$client_limit = DB::table('schedules')->select('client_limit')->first(); //to future use

        $inspect = 0;
        $limited = [];
        foreach ($request->Checkbox as $c) {
            $counterx = DB::table('schedule_counts')->select('counter')->where("schedule_id", $c)->first();

            if ($counterx->counter >= 2) {
                $inspect++;
                array_push($limited, $c);
            }
        }

        $s = implode(",", $limited);

        $j = 0;

        $current_user = Auth::user();
        $selected_package = DB::table('user_packages')->select('package_id')->where("user_id", $current_user->id)->first();
        $classes_to_cover = DB::table('packages')->select('classes_to_cover')->where("id", $selected_package->package_id)->first();

        if ((($classes_to_cover->classes_to_cover) / 4) == count($request->Checkbox)) {

        foreach ($request->Checkbox as $check) {
            $current_user = Auth::user();
            $selected_package = DB::table('user_packages')->select('package_id')->where("user_id", $current_user->id)->first();

            $user_schedule = new UserSchedule;

            if ($inspect == 0) {
                $user_schedule->schedule_id = $check;
                $user_schedule->user_id = $current_user->id;
                $user_schedule->package_id = $selected_package->package_id;

                    $user_schedule->save();

                    DB::table('schedule_counts')
                        ->where('schedule_id', $check)
                        ->increment('counter');

                    Session::flash('msgsuccess', 'Schedules Booked Successfully!');

            }//end if
            else { //client_limit exceeded

                Session::flash('msgfail2', 'Schedule Client Limit In Schedule => ' . $s . ' Exceeded..');

                if ($j == count($limited)) {
                    break;
                }

                $wait = new WaitingQueue;

                $wait->schedule_id = $check;
                $wait->user_id = 2;

                $wait->save();

                $j++;

            } //end of else

        }//end of foreach
    }else{
            Session::flash('msgfail', 'Schedules Booking Is Failed! Try again..');
        }

            return redirect()->back();

    }//end of store function


    //-----------------start of edit function--------------
    public function edit()
    { //return a view for update purpose
        $Checkbox = []; //initialized empty stack
        $current_user = Auth::user(); //current user
        $finds = UserSchedule::where("user_id", $current_user->id)->get(); //data corresponding to current user
        foreach ($finds as $find) {
            array_push($Checkbox, $find->schedule_id); //push schedule ids to the empty stack
        }
        $schedule_monday = Schedule::all()->where('day', '=', 'Monday');
        $schedule_tuesday = Schedule::all()->where('day', '=', 'Tuesday');
        $schedule_wednesday = Schedule::all()->where('day', '=', 'Wednesday');
        $schedule_thursday = Schedule::all()->where('day', '=', 'Thursday');
        $schedule_friday = Schedule::all()->where('day', '=', 'Friday');
        $schedule_saturday = Schedule::all()->where('day', '=', 'Saturday');
        $schedule_sunday = Schedule::all()->where('day', '=', 'Sunday');
        return view('customer_pages.schedule_update', compact('schedule_monday', 'schedule_tuesday', 'schedule_wednesday', 'schedule_thursday', 'schedule_friday', 'schedule_saturday', 'schedule_sunday', 'Checkbox'));
    }//edit


   //------------------------start of update function---------------------------------
    public function update(Request $request)
    { //change schedules

        //$client_limit = DB::table('schedules')->select('client_limit')->first(); //to future use

        $inspect = 0;
        $limited = [];
        foreach($request->Checkbox as $c){
            $counterx = DB::table('schedule_counts')->select('counter')->where("schedule_id",$c)->first();

            if($counterx->counter >= 2){
                $inspect++;
                array_push($limited,$c);
            }

        }

        $s = implode(",",$limited);

        $selected_schedules = []; //initialized empty stack
        $current_user = Auth::user(); //current user
        $finds = UserSchedule::where("user_id", $current_user->id)->get(); //data corresponding to current user

        foreach ($finds as $find) {
            array_push($selected_schedules, $find->schedule_id); //push schedule ids to the empty stack
        }

        $new_selections = $request->Checkbox; //updated checkboxes

        //$difference = array_diff($selected_schedules,$new_selections);

        if(count($new_selections) == count($selected_schedules)) {
                $i = 0;
                while ($i < count($selected_schedules)) {
                    if($inspect == 0) {
                        if ($selected_schedules[$i] != $new_selections[$i] && !in_array($new_selections[$i],$selected_schedules) ) {

                            $x = UserSchedule::select('id')->where([['schedule_id','=', $selected_schedules[$i]],["user_id",'=',$current_user->id]])->first();
                            $selected_package = DB::table('user_packages')->select('package_id')->where("user_id", $current_user->id)->first();
                            //$classes_to_cover = DB::table('packages')->select('classes_to_cover')->where("id", $selected_package->package_id)->first();
                            $user_schedule = UserSchedule::find($x->id);

                            $user_schedule->schedule_id = $new_selections[$i];
                            $user_schedule->package_id = $selected_package->package_id;
                            $user_schedule->user_id = $current_user->id;

                            $user_schedule->save();

                            DB::table('schedule_counts')
                                ->where('schedule_id', $new_selections[$i])
                                ->increment('counter');

                            DB::table('schedule_counts')
                                ->where('schedule_id',$selected_schedules[$i])
                                ->decrement('counter');

                            Session::flash('msgsuccess', 'Schedules Updated Successfully!');

                            //Queue scenario for monday-1
                            $monday1_stack = [];

                            $monday1_queue = [];

                                $x1 = DB::table('waiting_queues')->select('user_id')->where("schedule_id",1)->get();
                                foreach($x1 as $t1) {
                                    array_push($monday1_stack, $t1);
                                    $monday1_queue = array_reverse($monday1_stack);
                                }
                                $k = count($monday1_queue);
                                //dd($monday1_queue[$k-1]->user_id);
                                $counterx1 = DB::table('schedule_counts')->select('counter')->where("schedule_id",1)->first();

                                if($counterx->counter < 2){
                                    $system_user = SystemUser::where([['role_id','=',2],['id','=',$monday1_queue[$k-1]->user_id]])->get();
                                    Notification::send($system_user, new WaitListNotice());

                                    DB::table('waiting_queues')
                                        ->where([['schedule_id','=','1'],['user_id','=',$monday1_queue[$k-1]->user_id]])
                                        ->delete();
                                } //pop the top element from queue

                            //end of monday-1 scenario

                            //Queue scenario for monday-2
                            $monday2_stack = [];

                            $monday2_queue = [];

                            $x2 = DB::table('waiting_queues')->select('user_id')->where("schedule_id",2)->get();
                            foreach($x2 as $t2) {
                                array_push($monday2_stack, $t2);
                                $monday2_queue = array_reverse($monday2_stack);
                            }
                            $k2 = count($monday2_queue);
                            //dd($monday2_queue[$k2 -1]->user_id);
                            $counterx2 = DB::table('schedule_counts')->select('counter')->where("schedule_id",2)->first();

                            if($counterx2->counter < 2){
                                $system_user = SystemUser::where([['role_id','=',2],['id','=',$monday1_queue[$k2 -1]->user_id]])->get();
                                Notification::send($system_user, new WaitListNotice2());

                                DB::table('waiting_queues')
                                    ->where([['schedule_id','=','2'],['user_id','=',$monday1_queue[$k2 -1]->user_id]])
                                    ->delete();
                            } //pop the top element from queue

                            //end of monday-2 scenario

                            //Queue scenario for tuesday-1
                            $tuesday1_stack = [];

                            $tuesday1_queue = [];

                            $x3 = DB::table('waiting_queues')->select('user_id')->where("schedule_id",3)->get();
                            foreach($x3 as $t3) {
                                array_push($tuesday1_stack, $t3);
                                $tuesday1_queue = array_reverse($tuesday1_stack);
                            }
                            $k3 = count($tuesday1_queue);
                            //dd($tuesday1_queue[$k3 -1]->user_id);
                            $counterx3 = DB::table('schedule_counts')->select('counter')->where("schedule_id",3)->first();

                            if($counterx3->counter < 2){
                                $system_user = SystemUser::where([['role_id','=',2],['id','=',$monday1_queue[$k3 -1]->user_id]])->get();
                                Notification::send($system_user, new WaitListNotice3());

                                DB::table('waiting_queues')
                                    ->where([['schedule_id','=','3'],['user_id','=',$monday1_queue[$k3 -1]->user_id]])
                                    ->delete();
                            } //pop the top element from queue

                            //end of tuesday-1 scenario

                            //Queue scenario for tuesday-2
                            $tuesday2_stack = [];

                            $tuesday2_queue = [];

                            $x4 = DB::table('waiting_queues')->select('user_id')->where("schedule_id",4)->get();
                            foreach($x4 as $t4) {
                                array_push($tuesday2_stack, $t4);
                                $tuesday2_queue = array_reverse($tuesday2_stack);
                            }
                            $k4 = count($tuesday2_queue);
                            //dd($tuesday1_queue[$k4 -1]->user_id);
                            $counterx4 = DB::table('schedule_counts')->select('counter')->where("schedule_id",4)->first();

                            if($counterx4->counter < 2){
                                $system_user = SystemUser::where([['role_id','=',2],['id','=',$monday1_queue[$k4 -1]->user_id]])->get();
                                Notification::send($system_user, new WaitListNotice4());

                                DB::table('waiting_queues')
                                    ->where([['schedule_id','=','4'],['user_id','=',$monday1_queue[$k4 -1]->user_id]])
                                    ->delete();
                            } //pop the top element from queue

                            //end of tuesday-2 scenario


                            //Queue scenario for wednesday-1
                            $wednesday1_stack = [];

                            $wednesday1_queue = [];

                            $x5 = DB::table('waiting_queues')->select('user_id')->where("schedule_id",5)->get();
                            foreach($x5 as $t5) {
                                array_push($wedensday1_stack, $t5);
                                $wednesday1_queue = array_reverse($wednesday1_stack);
                            }
                            $k5 = count($wednesday1_queue);
                            //dd($wednesday1_queue[$k5 -1]->user_id);
                            $counterx5 = DB::table('schedule_counts')->select('counter')->where("schedule_id",5)->first();

                            if($counterx5->counter < 2){
                                $system_user = SystemUser::where([['role_id','=',2],['id','=',$monday1_queue[$k5 -1]->user_id]])->get();
                                Notification::send($system_user, new WaitListNotice5());

                                DB::table('waiting_queues')
                                    ->where([['schedule_id','=','5'],['user_id','=',$monday1_queue[$k5 -1]->user_id]])
                                    ->delete();
                            } //pop the top element from queue

                            //end of wednesday-1 scenario


















                        }
                        $i++;
                    }//end if of inspect checking
                    else{ //client limit exceeded

                        Session::flash('msgfail2', 'Schedule Client Limit In Schedule => ' . $s . ' Exceeded..');

                        if ($i == count($limited)) {
                            break;
                        }

                        $wait = new WaitingQueue;

                        $wait->schedule_id = $new_selections[$i];
                        $wait->user_id = 2;

                        $wait->save();

                        $i++;

                        $monday1_stack = [];
                        $monday2_stack = [];

                        $monday1_queue = [];
                        $monday2_queue = [];

                        $tuesday1_stack = [];
                        $tuesday2_stack = [];

                        $tuesday1_queue = [];
                        $tuesday2_queue = [];

                        $wednesday1_stack = [];
                        $wednesday2_stack = [];

                        $wednesday1_queue = [];
                        $wednesday2_queue = [];

                        $thursday1_stack = [];
                        $thursday2_stack = [];

                        $thursday1_queue = [];
                        $thursday2_queue = [];

                        $friday1_stack = [];
                        $friday2_stack = [];

                        $friday1_queue = [];
                        $friday2_queue = [];

                        $saturday_stack = [];

                        $saturday_queue = [];

                        $sunday_stack = [];

                        $sunday_queue = [];

                        if($new_selections[$i] == 1){
                            $x1 = DB::table('waiting_queues')->select('user_id')->where("schedule_id",1)->get();
                            foreach($x1 as $t1) {
                                array_push($monday1_stack, $t1);
                                $monday1_queue = array_reverse($monday1_stack);
                            }
                        }

                        if($new_selections[$i] == 2){
                            array_push($monday2_stack,$current_user->id);
                            $monday2_queue = array_reverse($monday2_stack);
                        }

                        if($new_selections[$i] == 3){
                            array_push($tuesday1_stack,$current_user->id);
                            $tuesday1_queue = array_reverse($tuesday1_stack);
                        }

                        if($new_selections[$i] == 4){
                            array_push($tuesday2_stack,$current_user->id);
                            $tuesday2_queue = array_reverse($tuesday2_stack);
                        }

                        if($new_selections[$i] == 5){
                            array_push($wednesday1_stack,$current_user->id);
                            $wednesday1_queue = array_reverse($wednesday1_stack);
                        }

                        if($new_selections[$i] == 6){
                            array_push($wednesday2_stack,$current_user->id);
                            $wednesday2_queue = array_reverse($wednesday2_stack);
                        }

                        if($new_selections[$i] == 7){
                            array_push($thursday1_stack,$current_user->id);
                            $thursday1_queue = array_reverse($thursday1_stack);
                        }

                        if($new_selections[$i] == 8){
                            array_push($thursday2_stack,$current_user->id);
                            $thursday2_queue = array_reverse($thursday2_stack);
                        }

                        if($new_selections[$i] == 9){
                            array_push($friday1_stack,$current_user->id);
                            $friday1_queue = array_reverse($friday1_stack);
                        }

                        if($new_selections[$i] == 10){
                            array_push($friday2_stack,$current_user->id);
                            $friday2_queue = array_reverse($friday2_stack);
                        }

                        if($new_selections[$i] == 11){
                            array_push($saturday_stack,$current_user->id);
                            $saturday_queue = array_reverse($saturday_stack);
                        }

                        if($new_selections[$i] == 12){
                            array_push($sunday_stack,$current_user->id);
                            $sunday_queue = array_reverse($sunday_stack);
                        }

                    }//end else

                }//end of while loop
            }// end if
        else {
            Session::flash('msgfail', 'Schedules Updating Is Failed! Try again..');
        }
        return redirect()->back();
    }//update

}//controller



