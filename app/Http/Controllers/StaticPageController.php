<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    //
    public function show_index()
    {
        return view('static_pages.home');
    }

    public function show_about()
    {
        return view('static_pages.about');
    }

    public function show_gallery()
    {
        return view('static_pages.gallery');
    }

//    public function show_packages()
//    {
//        return view('static_pages.class_packages');
//    }

    public function show_schedule()
    {
        return view('static_pages.schedule');
    }

    public function show_testimonials()
    {
        return view('static_pages.testimonials');
    }

    public function show_contact()
    {
        return view('static_pages.contact');
    }
}
