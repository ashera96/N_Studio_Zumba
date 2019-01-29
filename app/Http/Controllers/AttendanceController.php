<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

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
            $new = DB::table('attendances')->orderBy('created_at', 'asc')->paginate(6);
            return view('admin_panel.attendance_index',['attendances'=>$new]);
        }
        else if($role_id==3){
            $new1 = DB::table('attendances')->orderBy('created_at', 'asc')->paginate(6);
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
            try
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
                //$attend = Attendance::firstOrCreate(array('id' => Input::get('id'),'month' => Input::get('month'),'year' => Input::get('year')));

                $attend ->id =$request ->id;
                $attend ->month =$request ->month;
                $attend->year =$request ->year;
                $attend ->totalclasses =$request ->totalclasses;
                $attend ->attendanceclasses =$request ->attendanceclasses;
                $attend ->percentage =$request ->percentage;

                $attend ->save();

                Session::flash ( 'msgi', 'Attendance Successfully added!' );
                return redirect('/admin/reports_attendance/');
            }
            catch(\Exception $e)
            {
                Session::flash ( 'msgz', 'Record already exists!' );
                return redirect('/admin/reports_attendance/');
            }

        }

        else if($role_id==3){
            try{
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

                Session::flash ( 'msgj', 'Attendance Successfully added!' );
                return redirect('/recep/recep_reports_attendance/');
            }
            catch (\Exception $e)
            {
                Session::flash ( 'msgw', 'Record already exists!' );
                return redirect('/recep/recep_reports_attendance/');
            }

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
        $tot1 = DB::table('attendances')
            ->select('totalclasses')
            ->where('id','=',$id)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->first();

        $att1 = DB::table('attendances')
            ->select('attendanceclasses')
            ->where('id','=',$id)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->first();

        if($role_id==1) {
            if($tot1->totalclasses > $att1->attendanceclasses) {
                Attendance::where('id', '=', $id)
                    ->where('month', '=', $month)
                    ->where('year', '=', $year)
                    ->update(['attendanceclasses' => DB::raw('attendanceclasses + 1')]);

                return redirect()->back();
            }
            else{
                Session::flash('msgA',"Cannot increase!!!");
                return redirect()->back();
            }

        }
        else if($role_id==3) {
            if ($tot1->totalclasses > $att1->attendanceclasses) {
                Attendance::where('id', '=', $id)
                    ->where('month', '=', $month)
                    ->where('year', '=', $year)
                    ->update(['attendanceclasses' => DB::raw('attendanceclasses + 1')]);

                return redirect()->back();
            }
        }
        else{
            Session::flash('msgB',"Cannot increase!!!");
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


    /* public function total($id)
     {
         $new = DB::table('attendances')->where('id','=',$id)->select('totalclasses')
         ->get();
         return view('admin_panel.attendance_show',['attendances'=>$new]);
     }
 */

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

            return view('admin_panel.attendance_edit', ['attendance' => $attfind]);
        }

        else if($role_id==3) {
            $attfind = DB::table('attendances')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->get()->first();

            return view('recep_panel.attendance_edit', ['attendance' => $attfind]);
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

            $attfind =\App\Attendance::where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)->first();

            $attfind->id =$request ->id;
            $attfind ->month =$request ->month;
            $attfind ->year =$request ->year;
            $attfind ->totalclasses =$request ->totalclasses;
            $attfind ->attendanceclasses =$request ->attendanceclasses;
            $attfind ->percentage =$request ->percentage;
            $attfind ->save();

            Session::flash ( 'msgk', 'Attendance Successfully updated!' );
            return redirect('admin/reports_attendance');
        }
        else if($role_id==3) {
            $this->validate($request,[
                'id' => 'required',
                'month'=>'required',
                'year'=>'required',
                'totalclasses' =>'required',
                'attendanceclasses' =>'required',
                'percentage' =>'required',

            ]);

            $attfind1 =\App\Attendance::where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)->first();

            $attfind1->id =$request ->id;
            $attfind1->month =$request ->month;
            $attfind1->year =$request ->year;
            $attfind1->totalclasses =$request ->totalclasses;
            $attfind1->attendanceclasses =$request ->attendanceclasses;
            $attfind1->percentage =$request ->percentage;
            $attfind1->save();

            Session::flash ( 'msgl', 'Attendance Successfully updated!' );
            return redirect('recep/recep_reports_attendance');
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

            Session::flash ( 'msgm', 'Attendance Successfully Deleted!' );
            return redirect('admin/reports_attendance');
        }
        else if($role_id==3){
            DB::table('attendances')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->delete();

            Session::flash ( 'msgn', 'Attendance Successfully Deleted!' );
            return redirect('recep/recep_reports_attendance');
        }

    }
}
