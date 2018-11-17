<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    //
    public function show_index()
    {
        $posts = Post::orderBy('created_at','DESC')->get(); //display posts in the home page
        //$posts = Post::all();
        return view('static_pages.home')->with('posts', $posts);
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
