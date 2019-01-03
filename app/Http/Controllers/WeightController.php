<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weight;
use DB;

class WeightController extends Controller
{
    public function index()
    {
        /*$new = Weight::all();
        return view('admin_panel.weight_index', ['weights' => $new]);*/
        $weights = DB::table('weights')->orderBy('id', 'asc')->paginate(6);
        return view('admin_panel.weight_index', ['weights' => $weights]);

    }

    public function create()
    {
        return view('admin_panel.add_weight');
    }

    public function search(Request $request)
    {
        $search = $request -> get('search');
        $weights = DB::table('weights')->where('id', 'like', '%',$search,'%')->paginate(6);
        return view('admin_panel.weight_index',['weights'=>$weights]);
    }

    public function store(Request $request)
    {
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

        return redirect('/admin/reports/')->with('success','Weight Added');
    }

    public function view($id)
    {
        $wegfind = Weight::findOrFail($id);
        return view('admin_panel.weight_view',['weight'=>$wegfind]);

        /*$cusfind = User::find($id);
        return view('admin_panel.user_edit',compact('cusfind','id')); */
    }

    public function edit($id,$month,$year)
    {
        $wegfind =  DB::table('weights')->where('id', '=', $id)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->get()->first();
        return view('admin_panel.weight_edit',['weight'=>$wegfind]);

        /*$cusfind = User::find($id);
        return view('admin_panel.user_edit',compact('cusfind','id')); */
    }

    public function update(Request $request, $id,$month,$year)
    {
        $this->validate($request,[
            'id' => 'required',
            'month'=>'required',
            'year'=>'required',
            'weight' =>'required',

        ]);

        $weightfind =$wegfind =  DB::table('weights')->where('id', '=', $id)
            ->where('month', '=', $month)
            ->where('year', '=', $year);

        $weightfind ->id =$request ->id;
        $weightfind ->month =$request ->month;
        $weightfind ->year =$request ->year;
        $weightfind ->weight =$request ->weight;
        $weightfind ->save();

        return redirect('admin/reports')->with('success','Weight Updated');


    }

    public function destroy($id,$month,$year)
    {
        DB::table('weights')->where('id', '=', $id)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->delete();

        return redirect('admin/reports');

    }


}
