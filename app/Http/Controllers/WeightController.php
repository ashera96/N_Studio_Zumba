<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weight;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WeightController extends Controller
{
    public function index()
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $weights = DB::table('weights')->orderBy('id', 'asc')->paginate(6);
            return view('admin_panel.weight_index', ['weights' => $weights]);
        }
        else if($role_id==3){
            $weights1 = DB::table('weights')->orderBy('id', 'asc')->paginate(6);
            return view('recep_panel.weight_index', ['weights' => $weights1]);
        }


    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            return view('admin_panel.add_weight');
        }
        else if($role_id==3){
            return view('recep_panel.add_weight');
        }


    }

    public function store(Request $request)
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $this->validate($request,[
                'id' => 'required',
                'month' => 'required',
                'year' => 'required',
                'weight' => 'required',
            ]);

            $weightnew = new Weight;

            $weightnew ->id =$request ->id;
            $weightnew ->month =$request ->month;
            $weightnew->year =$request ->year;
            $weightnew ->weight =$request ->weight;

            $weightnew ->save();

            Session::flash('msgr2', 'Successfully added!'); //print flash msg after successfully added

            return redirect('admin/reports');
        }
        else if($role_id==3) {
            $this->validate($request,[
                'id' => 'required',
                'month' => 'required',
                'year' => 'required',
                'weight' => 'required',
            ]);

            $weightnew1 = new Weight;

            $weightnew1 ->id =$request ->id;
            $weightnew1 ->month =$request ->month;
            $weightnew1->year =$request ->year;
            $weightnew1 ->weight =$request ->weight;

            $weightnew1->save();

            Session::flash('msgr2', 'Successfully added!'); //print flash msg after successfully added

            return redirect('recep/recep_reports');
        }

    }

    public function see($id,$month,$year){
        $wegfind = DB::table('weights')->where('id', '=', $id)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->get()->first();
        return view('admin_panel.weight_view',['weights'=>$wegfind]);


        /*$cusfind = User::find($id);
        return view('admin_panel.user_edit',compact('cusfind','id')); */
    }

    public function edit($id,$month,$year)
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $wegfind = DB::table('weights')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->get()->first();
            return view('admin_panel.weight_edit', ['weight' => $wegfind]);
        }

        else if($role_id==3) {
            $wegfind = DB::table('weights')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->get()->first();
            return view('recep_panel.weight_edit', ['weight' => $wegfind]);
        }


        /*$cusfind = User::find($id);
        return view('admin_panel.user_edit',compact('cusfind','id')); */
    }

    public function update(Request $request, $id,$month,$year)
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $this->validate($request,[
                'id' => 'required',
                'month'=>'required',
                'year'=>'required',
                'weight' =>'required',

            ]);

            $weightfind = DB::table('weights')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year);

            $weightfind ->id =$request ->id;
            $weightfind ->month =$request ->month;
            $weightfind ->year =$request ->year;
            $weightfind ->weight =$request ->weight;
            $weightfind ->save();

            return redirect('admin/reports')->with('success','Weight Updated');
        }
        else if ($role_id==3){
            $this->validate($request,[
                'id' => 'required',
                'month'=>'required',
                'year'=>'required',
                'weight' =>'required',

            ]);

            $weightfind2 =DB::table('weights')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year);

            $weightfind2 ->id =$request ->id;
            $weightfind2 ->month =$request ->month;
            $weightfind2 ->year =$request ->year;
            $weightfind2 ->weight =$request ->weight;
            $weightfind2 ->save();

            return redirect('recep/recep_reports')->with('success','Weight Updated');
        }

    }

    public function destroy($id,$month,$year)
    {
        $role_id = Auth::user()->role->id;

        if($role_id==1) {
            DB::table('weights')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->delete();

            return redirect('admin/reports');
        }
        else if($role_id==3){
            DB::table('weights')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->delete();

            return redirect('recep/recep_reports');
        }

    }


}
