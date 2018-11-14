<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\SystemUser;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string',
            'post_body'=>'required|string',
        ]);

        $post = new Post;
        $post ->title = $request ->title;
        $post ->post_body =$request ->post_body;

    //send a email about the general post
        if($post ->save()) {
            $data = [
                'post_body'=>$request->post_body,
                'title'=>$request->title,
            ];
            Mail::send('email.generalNews', $data, function ($post_body) use ($request, $data) {
                $current_user = Auth::user();

                $system_user = SystemUser::where("role_id", "==", $current_user->role_id)->orWhere("role_id", 2)->get();

                foreach ($system_user as $su) {
                    $post = new Post;
                    $post ->title = $request ->title;
                    $post_body->bcc($su->email); //for hide others email addresses
                    $post_body->subject($post->title);
                }
            });
        }
        return redirect()->back();
    }
}
