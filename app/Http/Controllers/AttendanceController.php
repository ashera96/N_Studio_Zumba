<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$new  =Attendance::all();
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $new = DB::table('attendances')->orderBy('id', 'asc')->paginate(6);
            return view('admin_panel.attendance_index',['attendances'=>$new]);
        }
        else if($role_id==3){
            $new1 = DB::table('attendances')->orderBy('id', 'asc')->paginate(6);
            return view('recep_panel.attendance_index',['attendances'=>$new1]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            return view('admin_panel.add_attendance');
        }
        else if($role_id==3){
            return view('recep_panel.add_attendance');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $this->validate($request,[
                'id' => 'required',
                'month' => 'required',
                'year' => 'required',
                'totalclasses' => 'required',
                'attendanceclasses' => 'required',
                'percentage' => 'required',
            ]);

            $attend = new Attendance;

            $attend ->id =$request ->id;
            $attend ->month =$request ->month;
            $attend->year =$request ->year;
            $attend ->totalclasses =$request ->totalclasses;
            $attend ->attendanceclasses =$request ->attendanceclasses;
            $attend ->percentage =$request ->percentage;

            $attend ->save();

            return redirect('/admin/reports_attendance/')->with('success','Attendance Added');
        }
        else if($role_id==3){
            $this->validate($request,[
                'id' => 'required',
                'month' => 'required',
                'year' => 'required',
                'totalclasses' => 'required',
                'attendanceclasses' => 'required',
                'percentage' => 'required',
            ]);

            $attend = new Attendance;

            $attend ->id =$request ->id;
            $attend ->month =$request ->month;
            $attend->year =$request ->year;
            $attend ->totalclasses =$request ->totalclasses;
            $attend ->attendanceclasses =$request ->attendanceclasses;
            $attend ->percentage =$request ->percentage;

            $attend ->save();

            return redirect('/recep/recep_reports_attendance/')->with('success','Attendance Added');
        }

    }

    public function UpdateTotal($id,$month,$year){
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            Attendance::where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->update(['totalclasses' => DB::raw('totalclasses + 1')]);

            return redirect()->back();
        }
        else if($role_id==3)
        {
            Attendance::where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->update(['totalclasses' => DB::raw('totalclasses + 1')]);

            return redirect()->back();
        }


    }

    public function UpdateAttend($id,$month,$year){
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            Attendance::where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->update(['attendanceclasses' => DB::raw('attendanceclasses + 1')]);

            return redirect()->back();
        }
        else if($role_id==3) {
            Attendance::where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->update(['attendanceclasses' => DB::raw('attendanceclasses + 1')]);

            return redirect()->back();
        }

    }

    public function UpdatePercent($id,$month,$year){
            $role_id = Auth::user()->role->id;
            if($role_id==1) {
                Attendance::where('id', '=', $id)
                    ->where('month', '=', $month)
                    ->where('year', '=', $year)
                    ->update(['percentage' => DB::raw('round((attendanceclasses*100/totalclasses),2)')]);

                return redirect()->back();
            }
            else if($role_id==3) {
                Attendance::where('id', '=', $id)
                    ->where('month', '=', $month)
                    ->where('year', '=', $year)
                    ->update(['percentage' => DB::raw('round((attendanceclasses*100/totalclasses),2)')]);

                return redirect()->back();
            }


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$month,$year)
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $attfind = DB::table('attendances')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->get()->first();
            return view('admin_panel.attendance_edit', ['attendances' => $attfind]);
        }

        else if($role_id==3) {
            $attfind = DB::table('attendances')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->get()->first();
            return view('recep_panel.attendance_edit', ['attendances' => $attfind]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,$month,$year)
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $this->validate($request,[
                'id' => 'required',
                'month'=>'required',
                'year'=>'required',
                'totalclasses' =>'required',
                'attendanceclasses' =>'required',
                'percentage' =>'required',

            ]);

            $attfind =DB::table('weights')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year);

            $attfind->id =$request ->id;
            $attfind ->month =$request ->month;
            $attfind ->year =$request ->year;
            $attfind ->totalclasses =$request ->totalclasses;
            $attfind ->attendanceclasses =$request ->attendanceclasses;
            $attfind ->percentage =$request ->percentage;
            $attfind ->save();

            return redirect('admin/reports_attendance')->with('success','Weight Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$month,$year)
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            DB::table('attendances')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->delete();

            return redirect('admin/reports_attendance');
        }
        else if($role_id==3){
            DB::table('attendances')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->delete();

            return redirect('recep/recep_reports_attendance');
        }


    }
}
