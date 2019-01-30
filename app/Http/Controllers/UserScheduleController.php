<?php

namespace App\Http\Controllers;

use App\Notifications\ScheduleRenewAlert;
use App\Notifications\WaitListNotice;
use App\Notifications\WaitListNotice2;
use App\Notifications\WaitListNotice3;
use App\Notifications\WaitListNotice4;
use App\Notifications\WaitListNotice5;
use App\Notifications\WaitListNotice6;
use App\Notifications\WaitListNotice7;
use App\Notifications\WaitListNotice8;
use App\Notifications\WaitListNotice9;
use App\Notifications\WaitListNotice10;
use App\Notifications\WaitListNotice11;
use App\Notifications\WaitListNotice12;
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
        $for_use = [];
        $current_user = Auth::user(); //current user
        $finds = UserSchedule::where("user_id", $current_user->id)->get(); //data corresponding to current user

        //single object instance
        $selected_package = DB::table('user_payments')->select('package_id')->where("user_id", $current_user->id)->first();

        $schedule_limit = Schedule::select('client_limit')->where('id',1)->first(); //get the client limit

        $counter1 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 1)->first();
        $counter2 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 2)->first();
        $counter3 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 3)->first();
        $counter4 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 4)->first();
        $counter5 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 5)->first();
        $counter6 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 6)->first();
        $counter7 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 7)->first();
        $counter8 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 8)->first();
        $counter9 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 9)->first();
        $counter10 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 10)->first();
        $counter11 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 11)->first();
        $counter12 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 12)->first();


        //dd($selected_package);

        $schedule_monday = Schedule::all()->where('day', '=', 'Monday');
        $schedule_tuesday = Schedule::all()->where('day', '=', 'Tuesday');
        $schedule_wednesday = Schedule::all()->where('day', '=', 'Wednesday');
        $schedule_thursday = Schedule::all()->where('day', '=', 'Thursday');
        $schedule_friday = Schedule::all()->where('day', '=', 'Friday');
        $schedule_saturday = Schedule::all()->where('day', '=', 'Saturday');
        $schedule_sunday = Schedule::all()->where('day', '=', 'Sunday');

        if(!is_null($selected_package)) { //to handle exception
            $selected_package_id = $selected_package->package_id;
            $pkg_name = DB::table('packages')->select('name')->where("id", $selected_package_id)->first();
            $selected_package_name = $pkg_name->name;

            foreach ($finds as $find) {
                array_push($for_use, $find->schedule_id); //push schedule ids to the empty stack
            }

            $new_classes_to_cover = DB::table('packages')->select('classes_to_cover')->where("id", $selected_package_id)->first();
            $old_count = count($for_use);
            //dd($old_count);
            $new_count = ($new_classes_to_cover->classes_to_cover)/4; //new package

            if(($old_count > $new_count) && $old_count>0){ //logic goes here
                //dd($selected_package_name);
                DB::table('user_schedules')
                    ->where('user_id',$current_user->id)  //drop old selected schedule details
                    ->delete();
                foreach ($for_use as $updt){
                    DB::table('schedule_counts')
                        ->where('schedule_id',$updt)  //decrements the counter of corresponding schedules
                        ->decrement('counter');
                }
                $system_user = SystemUser::where([['role_id','=',2],['id','=',$current_user->id]])->get();
                Notification::send($system_user, new ScheduleRenewAlert()); //send a notification to inform that select new schedules

            }//logic ends
            else{
                foreach ($finds as $find) {
                    array_push($Checkbox, $find->schedule_id); //push schedule ids to the empty stack
                }
            }
            return view('customer_pages.class_schedule', compact('schedule_monday', 'schedule_tuesday', 'schedule_wednesday', 'schedule_thursday', 'schedule_friday', 'schedule_saturday', 'schedule_sunday', 'Checkbox','selected_package_name','selected_package_id','schedule_limit','counter1'
                ,'counter2','counter3','counter4','counter5','counter6','counter7','counter8','counter9','counter10','counter11','counter12'
            ));
        }else{
            return view('customer_pages.schedule_blocked', compact('schedule_monday', 'schedule_tuesday', 'schedule_wednesday', 'schedule_thursday', 'schedule_friday', 'schedule_saturday', 'schedule_sunday', 'Checkbox','selected_package_name','selected_package_id'));
        }
    }//index



    //---------------start of store function---------------------------------
    public function store(Request $request)
    {
        $current_user = Auth::user();
        $selected_package = DB::table('user_payments')->select('package_id')->where("user_id", $current_user->id)->first();
        $classes_to_cover = DB::table('packages')->select('classes_to_cover')->where("id", $selected_package->package_id)->first();

        //this is for except the weekend package
        if($request->Checkbox != null) {
            if ((count($request->Checkbox) <= (($classes_to_cover->classes_to_cover) / 4)) && ($selected_package->package_id != 4)) {
                foreach ($request->Checkbox as $check) {
                    $current_user = Auth::user();
                    $selected_package = DB::table('user_payments')->select('package_id')->where("user_id", $current_user->id)->first();

                    $user_schedule = new UserSchedule;

                    $user_schedule->schedule_id = $check;
                    $user_schedule->user_id = $current_user->id;
                    $user_schedule->package_id = $selected_package->package_id;

                    $user_schedule->save();

                    DB::table('schedule_counts')
                        ->where('schedule_id', $check)
                        ->increment('counter');

                    Session::flash('msgsuccess', 'Schedules Booked Successfully!');

                }//end of foreach
            }
            //this is for the weekend package
            elseif ((($classes_to_cover->classes_to_cover) / 4) == count($request->Checkbox) && ($selected_package->package_id == 4) && (in_array(11, $request->Checkbox)) && (in_array(12, $request->Checkbox))) {

                foreach ($request->Checkbox as $check) {
                    $current_user = Auth::user();
                    $selected_package = DB::table('user_payments')->select('package_id')->where("user_id", $current_user->id)->first();

                    $user_schedule = new UserSchedule;

                    $user_schedule->schedule_id = $check;
                    $user_schedule->user_id = $current_user->id;
                    $user_schedule->package_id = $selected_package->package_id;

                    $user_schedule->save();

                    DB::table('schedule_counts')
                        ->where('schedule_id', $check)
                        ->increment('counter');

                    Session::flash('msgsuccess', 'Schedules Booked Successfully!');

                }//end of foreach
            } else {
                Session::flash('msgfail', 'Schedules Booking Is Failed! Try again..');
            }
        }
        else{
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

        $selected_package = DB::table('user_payments')->select('package_id')->where("user_id", $current_user->id)->first();
        $selected_package_id = $selected_package->package_id;
        $pkg_name =  DB::table('packages')->select('name')->where("id", $selected_package_id)->first();
        $selected_package_name = $pkg_name->name;

        $schedule_monday = Schedule::all()->where('day', '=', 'Monday');
        $schedule_tuesday = Schedule::all()->where('day', '=', 'Tuesday');
        $schedule_wednesday = Schedule::all()->where('day', '=', 'Wednesday');
        $schedule_thursday = Schedule::all()->where('day', '=', 'Thursday');
        $schedule_friday = Schedule::all()->where('day', '=', 'Friday');
        $schedule_saturday = Schedule::all()->where('day', '=', 'Saturday');
        $schedule_sunday = Schedule::all()->where('day', '=', 'Sunday');

        $schedule_limit = Schedule::select('client_limit')->where('id',1)->first(); //get the client limit

        $counter1 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 1)->first();
        $counter2 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 2)->first();
        $counter3 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 3)->first();
        $counter4 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 4)->first();
        $counter5 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 5)->first();
        $counter6 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 6)->first();
        $counter7 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 7)->first();
        $counter8 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 8)->first();
        $counter9 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 9)->first();
        $counter10 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 10)->first();
        $counter11 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 11)->first();
        $counter12 = DB::table('schedule_counts')->select('counter')->where("schedule_id", 12)->first();

        return view('customer_pages.schedule_update', compact('schedule_monday', 'schedule_tuesday', 'schedule_wednesday', 'schedule_thursday', 'schedule_friday', 'schedule_saturday', 'schedule_sunday', 'Checkbox','selected_package_name',
            'schedule_limit','counter1','counter2','counter3','counter4','counter5','counter6','counter7','counter8','counter9','counter10',
            'counter11','counter12'));
    }//edit


    //------------------------start of update function---------------------------------
    public function update(Request $request)
    { //change schedules

        $selected_schedules = []; //initialized empty stack
        $current_user = Auth::user(); //current user
        $finds = UserSchedule::where("user_id", $current_user->id)->get(); //data corresponding to current user

        foreach ($finds as $find) {
            array_push($selected_schedules, $find->schedule_id); //push schedule ids to the empty stack
        }

        if($request->Checkbox != null) {
            $new_selections = $request->Checkbox; //updated checkboxes
        }

        $selected_package = DB::table('user_payments')->select('package_id')->where("user_id", $current_user->id)->first();
        $classes_to_cover = DB::table('packages')->select('classes_to_cover')->where("id", $selected_package->package_id)->first();

        if($request->Checkbox != null) {
            if (count($new_selections) <= ($classes_to_cover->classes_to_cover/4)) {

                DB::table('user_schedules')
                    ->where('user_id',$current_user->id)  //drop old selected schedule details
                    ->delete();

                foreach ($selected_schedules as $ss){
                    DB::table('schedule_counts')
                        ->where('schedule_id',$ss)  //decrements the counter of corresponding schedules
                        ->decrement('counter');
                }

                $i = 0;
                while ($i < count($new_selections)) {


                        $user_schedule = new UserSchedule;

                        $user_schedule->schedule_id = $new_selections[$i];
                        $user_schedule->package_id = $selected_package->package_id;
                        $user_schedule->user_id = $current_user->id;

                        $user_schedule->save();

                        DB::table('schedule_counts')
                            ->where('schedule_id', $new_selections[$i])
                            ->increment('counter');

                        Session::flash('msgsuccessupdate', 'Schedules Updated Successfully!');

                        $i++;
                    }
                return redirect('home/schedule');
            }else{
                Session::flash('msgfail', 'Schedules Updating Is Failed! Try again..');
                return redirect()->back();
            }
        }// end if
            else {
                Session::flash('msgfail', 'Schedules Updating Is Failed! Try again..');
                return redirect()->back();
            }
    }//update

}//controller



