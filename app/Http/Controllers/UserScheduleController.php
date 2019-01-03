<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\UserSchedule;
use Auth;
use DB;
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

    public function store(Request $request)
    {
        {
            foreach ($request->Checkbox as $check) {
                $current_user = Auth::user();
                $selected_package = DB::table('user_package')->select('package_id')->where("user_id", $current_user->id)->first();
                $classes_to_cover = DB::table('packages')->select('classes_to_cover')->where("id", $selected_package->package_id)->first();
                $count = count(UserSchedule::all()->where('user_id', '=', $current_user->id)); //count
                $schedule = new Schedule;
                $user_schedule = new UserSchedule;
                $current_user = Auth::user();

                $user_schedule->schedule_id = $check;
                $user_schedule->user_id = $current_user->id;
                $user_schedule->package_id = $selected_package->package_id;
                //validating.....
                if (((($classes_to_cover->classes_to_cover) / 4) == count($request->Checkbox)) && ($count != count($request->Checkbox))) {
                    $user_schedule->save();
                    Session::flash('msgsuccess', 'Schedules Are Booked Successfully!');
                } else {
                    Session::flash('msgfail', 'Schedules Booking Is Failed! Try again..');
                }
            }
            return redirect()->back();
        }
    }//store function

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

    public function update(Request $request)
    { //change schedules
        $selected_schedules = []; //initialized empty stack
        $current_user = Auth::user(); //current user
        $finds = UserSchedule::where("user_id", $current_user->id)->get(); //data corresponding to current user

        foreach ($finds as $find) {
            array_push($selected_schedules, $find->schedule_id); //push schedule ids to the empty stack
        }

        $new_selections = $request->Checkbox; //updated checkboxes

        //$difference = array_diff($new_selections, $selected_schedules);

        if(count($new_selections) == count($selected_schedules)) {
            $i = 0;
            while ($i < count($selected_schedules)) {
                if ($selected_schedules[$i] != $new_selections[$i]) {
                    $x = UserSchedule::select('id')->where("schedule_id", $selected_schedules[$i])->first();
                    $selected_package = DB::table('user_package')->select('package_id')->where("user_id", $current_user->id)->first();
                    //$classes_to_cover = DB::table('packages')->select('classes_to_cover')->where("id", $selected_package->package_id)->first();
                    $user_schedule = UserSchedule::find($x->id);

                    $user_schedule->schedule_id = $new_selections[$i];
                    $user_schedule->package_id = $selected_package->package_id;
                    $user_schedule->user_id = $current_user->id;

                    $user_schedule->save();
                    Session::flash('msgsuccess', 'Schedules Updated Successfully!');
                }
                $i++;
            }//end of while loop
        }//end if
        else {
            Session::flash('msgfail', 'Schedules Updating Is Failed! Try again..');
        }
        return redirect()->back();
    }//update

}



