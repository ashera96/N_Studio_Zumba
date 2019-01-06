<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\SystemUser;
use Image;

class PostController extends Controller
{
    public function index(){ //show posts on the page
        $posts = Post::orderBy('updated_at','DESC')->paginate(5);
        return view('admin_panel.show_posts')->with('posts', $posts);
    }

    public function store(Request $request)  //store posts in the db
    {
        $this->validate($request,[
            'title'=>'required|string|max:191',
            'post_body'=>'required|string',
            'upload_images'=>'image|mimes:jpeg,jpg,png,gif|max:4096',
        ]);

        $post = new Post;
        $post ->title = $request ->title;
        $post ->post_body =$request ->post_body;

        //upload images with the post
        if($request->hasFile('upload_images')){
            $image = $request->file('upload_images');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/posts/'.$filename);
            //Image::make($image)->resize(400,500)->save($location);
            Image::make($image)->fit(400)->save($location); //fit for 400*400
            $post->image = $filename;
        }


    //send a email about the general post
        if($post ->save()) {
            $data = [
                'post_body'=>$request->post_body,
                'title'=>$request->title,
            ];
            Mail::send('email.generalNews', $data, function ($post_body) use ($request, $data) {
                //$current_user = Auth::user();

                $system_user = SystemUser::where('role_id','=',2)->get();

                foreach ($system_user as $su) {
                    $post = new Post;
                    $post ->title = $request ->title;
                    $post_body->bcc($su->email); //for hide others email addresses
                    $post_body->subject($post->title);
                }
            });
            Session::flash('msgpst', 'Post Created Successfully!');
        }
        return redirect()->back();
    }

    public function update($id)  //update posts(return the view with post)
    {
        $post_find = Post::findOrFail($id);
        return view('admin_panel.post_update',['post'=>$post_find]);
    }

    public function edit(Request $request, $id) //update posts
    {
        $this->validate($request,[
            'title'=>'required|string|max:191',
            'post_body'=>'required|string',
            'upload_images'=>'image|mimes:jpeg,jpg,png,gif|max:4096',
        ]);

        $post_find =Post::findOrFail($id);
        $post_find ->title =$request ->title;
        $post_find ->post_body =$request ->post_body;

        //upload images with the post
        if($request->hasFile('upload_images')){
            $image = $request->file('upload_images');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/posts/'.$filename);
            //Image::make($image)->resize(400,500)->save($location);
            Image::make($image)->fit(400)->save($location); //fit for 400*400
            $post_find->image = $filename;
        }

        $post_find ->save();
        $data = [
            'post_body'=>$request->post_body,
            'title'=>$request->title,
        ];

        //send mail after updating
        Mail::send('email.generalNews', $data, function ($post_body) use ($request, $data) {
            //$current_user = Auth::user();

            $system_user = SystemUser::where('role_id','=',2)->get();

            foreach ($system_user as $su) {
                $post = new Post;
                $post ->title = $request ->title;
                $post_body->bcc($su->email); //for hide others email addresses
                $post_body->subject($post->title);
            }
        });

        Session::flash('msgupdt', 'Post Updated Successfully!');
        return redirect('admin/show_posts');

    }

    public function destroy($id) //delete posts
    {
        $post_find = Post::findOrFail($id);
        $post_find->delete();
        Session::flash('message', 'Post Deleted Successfully!');
        return redirect()->back();
    }

}
