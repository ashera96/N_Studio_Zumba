<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use DB;

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
        $new = DB::table('attendances')->orderBy('id', 'asc')->paginate(6);
        return view('admin_panel.attendance_index',['attendances'=>$new]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.add_attendance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    public function UpdateTotal($id,$month,$year){
        Attendance::where('id', '=', $id)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->update(['totalclasses' => DB::raw('totalclasses + 1')]);

        return redirect()->back();

    }

    public function UpdateAttend($id,$month,$year){
        Attendance::where('id', '=', $id)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->update(['attendanceclasses' => DB::raw('attendanceclasses + 1')]);

        return redirect()->back();

    }

    public function UpdatePercent($id,$month,$year){
        Attendance::where('id', '=', $id)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->update(['percentage' => DB::raw('round((attendanceclasses*100/totalclasses),2)')]);

        return redirect()->back();

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$month,$year)
    {
        DB::table('attendances')->where('id', '=', $id)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->delete();

        return redirect('admin/reports_attendance');

    }
}
