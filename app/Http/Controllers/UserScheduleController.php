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
        $Checkbox = []; //nitializedempty array
        $current_user = Auth::user(); //current user
        $finds=UserSchedule::where("user_id",$current_user->id)->get(); //data corresponding to current usser
        foreach($finds as $find){
            array_push($Checkbox, $find->schedule_id); //push schedule ids to the empty array
        }
        $schedule_monday = Schedule::all()->where('day', '=', 'Monday');
        $schedule_tuesday = Schedule::all()->where('day', '=', 'Tuesday');
        $schedule_wednesday = Schedule::all()->where('day', '=', 'Wednesday');
        $schedule_thursday = Schedule::all()->where('day', '=', 'Thursday');
        $schedule_friday = Schedule::all()->where('day', '=', 'Friday');
        $schedule_saturday = Schedule::all()->where('day', '=', 'Saturday');
        $schedule_sunday = Schedule::all()->where('day', '=', 'Sunday');
        return view('customer_pages.class_schedule', compact('schedule_monday', 'schedule_tuesday', 'schedule_wednesday', 'schedule_thursday', 'schedule_friday', 'schedule_saturday', 'schedule_sunday','Checkbox'));
    }

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
                $user_schedule->package_id = 2;
                //validating.....
                if (((($classes_to_cover->classes_to_cover) / 4) == count($request->Checkbox))&&($count!=count($request->Checkbox))) {
                    $user_schedule->save();
                    Session::flash('msgsuccess', 'Schedules Are Booked Successfully!');
                }else{
                    Session::flash('msgfail', 'Schedules Booking Is Failed! Try again..');
                }
            }
            return redirect()->back();
        }
    }
}


