<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\Message;


class MessagesController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'message' => 'required'
        ]);

        //create New Message
        /*
        $message = new Message;
        $message-> name = $request ->input('name');
        $message-> email = $request ->input('email');
        $message-> contact = $request ->input('contact');

        $message-> message = $request ->input('message');
        //Save message
        //$message->save();
        */
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'bodymessage'=>$request->message,
        ];

        Mail::send('email.msg',$data,function ($message) use ($data){

            $message -> from($data['email']);
            $message -> to('nstudioz950@gmail.com');
            $message -> subject('ContactUs Message');
            $message->replyTo($data['email']);
        });

        //Redirect
        return redirect()->back()->with('success', 'Your Message has been sent Successfully. Thank You for your Message');
    }


}
