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
}
