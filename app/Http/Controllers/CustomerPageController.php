<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerPageController extends Controller
{
    //
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

//    public function show_packages()
//    {
//        return view('static_pages.class_packages');
//    }

    public function show_schedule()
    {
        return view('customer_pages.schedule');
    }

    public function show_testimonials()
    {
        return view('customer_pages.testimonials');
    }

    public function show_contact()
    {
        return view('customer_pages.contact');
    }

    public function show_payment()
    {
        return view('customer_pages.payment');
    }

    public function show_reports()
    {
        return view('customer_pages.reports');
    }
}
