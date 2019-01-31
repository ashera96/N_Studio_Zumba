<?php

namespace App\Http\Controllers;

use App\SystemUser;
use App\User;
use Illuminate\Http\Request;
use App\Weight;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class WeightController extends Controller
{
    public function index()
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $weights = DB::table('weights')->orderBy('created_at', 'asc')->paginate(6);
            return view('admin_panel.weight_index', ['weights' => $weights]);
        }
        else if($role_id==3){
            $weights1 = DB::table('weights')->orderBy('created_at', 'asc')->paginate(6);
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

        $users = DB::table('system_users')->where([['role_id',2],['status',1]])->get();

        $user_stack = [];

        foreach ($users as $user) {
            array_push($user_stack, $user->id); //push user ids to the empty stack
        }

        if($role_id==1) {
            $this->validate($request, [
                'id' => 'required|integer|min:0',
                'month' => 'required',
                'year' => 'required|regex:/^[2]{1}[0-9]{3}$/',
                'weight' => 'required|numeric|min:0',
            ]);
            try {
                //$weightnew = Weight::firstOrCreate(array('id' => Input::get('id'),'month' => Input::get('month'),'year' => Input::get('year')));
                $weightnew = new Weight;

                $weightnew->id = $request->id;
                $weightnew->month = $request->month;
                $weightnew->year = $request->year;
                $weightnew->weight = $request->weight;

                if(in_array($request->id,$user_stack)) {
                    $weightnew->save();
                    Session::flash('msga', 'Weight Successfully added!');//print flash msg after successfully added
                }else{
                    Session::flash('msgf', 'This user is not exist');
                }
                return redirect('/admin/reports');
            }
            catch (\Exception $e) {
                Session::flash('msgx', 'Record already exists!');
                return redirect('/admin/reports');
            }
        }

        else if($role_id==3) {
            $this->validate($request, [
                'id' => 'required|integer|min:0',
                'month' => 'required',
                'year' => 'required|regex:/^[2]{1}[0-9]{3}$/',
                'weight' => 'required|numeric|min:0',
            ]);

            try {
                $weightnew1 = new Weight;

                $weightnew1->id = $request->id;
                $weightnew1->month = $request->month;
                $weightnew1->year = $request->year;
                $weightnew1->weight = $request->weight;

                if(in_array($request->id,$user_stack)) {
                    $weightnew1->save();
                    Session::flash('msgb', 'Weight Successfully added!');//print flash msg after successfully added
                }else{
                    Session::flash('msgff', 'This user is not exist');
                }
                return redirect('/recep/recep_reports');
            }
            catch (\Exception $e)
            {
                Session::flash('msgy', 'Record already exists!');
                return redirect('/recep/recep_reports');
            }
        }
    }

    public function see($id,$month,$year){
        $wegfind = DB::table('weights')->where('id', '=', $id)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->get()->first();

        return view('admin_panel.weight_view',['weights'=>$wegfind]); //view the weight report
    }

    public function edit($id,$month,$year)
    {
        $role_id = Auth::user()->role->id;

        if($role_id==1) {
            $wegfind = DB::table('weights')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->get()->first();

            return view('admin_panel.weight_edit', ['weight' => $wegfind]); //edit the weight
        }

        else if($role_id==3) {
            $wegfind = DB::table('weights')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->get()->first();

            return view('recep_panel.weight_edit', ['weight' => $wegfind]);
        }
    }

    public function update(Request $request, $id,$month,$year)
    {
        $role_id = Auth::user()->role->id;
        if($role_id==1) {
            $this->validate($request, [
                'id' => 'required|integer|min:0',
                'month' => 'required',
                'year' => 'required|regex:/^[2]{1}[0-9]{3}$/',
                'weight' => 'required|numeric|min:0',
            ]);

            /*
            $weightfind = \App\Weight::where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)->first();

            $weightfind ->id =$request ->id;
            $weightfind ->month =$request ->month;
            $weightfind ->year =$request ->year;
            $weightfind ->weight =$request ->weight;
            $weightfind ->save();
            */

            DB::table('weights')
                ->where([['id',$id],['month',$month],['year',$year]])
                ->update(['id' => $request->id,'month'=>$request ->month,'year'=>$request ->year,'weight'=>$request ->weight]);

            Session::flash ( 'msgc', 'Weight Successfully updated!' );
            return redirect('admin/reports');
        }
        else if ($role_id==3){
            $this->validate($request, [
                'id' => 'required|integer|min:0',
                'month' => 'required',
                'year' => 'required|regex:/^[2]{1}[0-9]{3}$/',
                'weight' => 'required|numeric|min:0',
            ]);

            /*
            $weightfind2 =\App\Weight::where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)->first();

            $weightfind2 ->id =$request ->id;
            $weightfind2 ->month =$request ->month;
            $weightfind2 ->year =$request ->year;
            $weightfind2 ->weight =$request ->weight;
            $weightfind2 ->save();

            */

            DB::table('weights')
                ->where([['id',$id],['month',$month],['year',$year]])
                ->update(['id' => $request->id,'month'=>$request ->month,'year'=>$request ->year,'weight'=>$request ->weight]);

            Session::flash ( 'msgd', 'Weight Successfully updated!' );
            return redirect('recep/recep_reports');
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

            Session::flash ( 'msge', 'Weight Successfully Deleted!' );
            return redirect('admin/reports');
        }
        else if($role_id==3){
            DB::table('weights')->where('id', '=', $id)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->delete();

            Session::flash ( 'msgf', 'Weight Successfully Deleted!' );
            return redirect('recep/recep_reports');
        }
    }
}
