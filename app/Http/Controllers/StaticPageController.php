<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use DB;

class StaticPageController extends Controller
{
    //
    public function show_index(Request $request)
    {
        //$posts = Post::orderBy('updated_at','DESC')->get(); //display posts in the home page
        $posts = Post::orderBy('updated_at','DESC')->paginate(5);
        //$posts = Post::all();

        if ($request->ajax()) {
            return view('customer_pages.pagination_data', compact('posts'));
        }

        return view('static_pages.home')->with('posts', $posts);
    }

    public function show_about()
    {
        return view('static_pages.about');
    }

    public function show_gallery()
    {
        $images = DB::table('gallery_uploads')->select('*')->get();
        return view('static_pages.gallery',compact('images'));
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
