<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenses;
use App\Income;

class IncomeReportController extends Controller
{
    //
    public function show_report(){
//        $posts = Post::orderBy('updated_at','DESC')->paginate(5);
//        return view('admin_panel.show_posts')->with('posts', $posts);

        $income = Income::orderBy('id','DSC')->limit(6)->get();
        $expenses = Expenses::orderBy('id','DSC')->limit(6)->get();
        return view('admin_panel.report',compact ('income','expenses'));
    }
}
