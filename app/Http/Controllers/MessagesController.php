<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Message;
use App\Mail;

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
        $message = new Message;
        $message-> name = $request ->input('name');
        $message-> email = $request ->input('email');
        $message-> contact = $request ->input('contact');

        $message-> message = $request ->input('message');
        //Save message
        $message->save();

        Mail::send('inc.messages', [
            'msg' => $request -> message
            ], function($mail) use($request){
                $mail->from($request -> email, $request -> name);

                $mail-> to('sspirakavi@gmail.com')->subject('Contact Message');
        }
        );

        //Redirect
        return redirect('/index/contact')->with('success', 'Your Message has been sent Successfully');
    }


}
