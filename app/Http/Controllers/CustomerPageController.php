<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomerPageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_home()
    {
        return view('customer_pages.home');
    }

    public function show_about()
    {
        return view('customer_pages.about');
    }

    public function show_gallery()
    {
        return view('customer_pages.gallery');
    }

    /*public function show_schedule()
    {
        return view('customer_pages.class_schedule');
    }*/

    public function show_testimonials()
    {
        return view('customer_pages.testimonials');
    }

    public function show_contact()
    {
        return view('customer_pages.contact');
    }

//    public function show_profile()
//    {
//        return view('customer_pages.profile');
//    }

    public function show_reports()
    {
        return view('customer_pages.reports');
    }
}
