<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'post_body'=>'required|string',
        ]);

        $post = new Post;
        $post ->post_body =$request ->post_body;
        $post ->save();
        return redirect()->back();
    }
}
