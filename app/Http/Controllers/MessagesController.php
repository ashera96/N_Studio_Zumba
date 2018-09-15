<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Message;
use Mail;

class MessagesController extends Controller
{
    public function submit(Request $request)
    {
        return view('/index/contact');
        /*$this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'message' => 'required'
        ]);

        //create New Message
        $message = new Message;
        $message-> name = $request ->input('name');
        $message-> email = $request ->input('email');
        $message-> contact = $request ->input('contact');

        $message-> message = $request ->input('message');
        //Save message
        $message->save();


        //Redirect
        return redirect('/index/contact');*/
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'message' => 'required'
        ]);

        Mail::send('emails.contact-messages', [
            'msg' => $request -> message
            ], function($mail) use($request){
                $mail->from($request -> email, $request -> name);

                $mail-> to('sspirakavi@gmail.com')->subject('message');
        }
        );

        //Redirect
        return redirect('/index/contact')->with('flash_message', 'Your Message has been sent Successfully. Thank You for your Message');
    }


}
