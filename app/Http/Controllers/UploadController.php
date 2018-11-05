<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

class UploadController extends Controller{

    public function upload(){

        if(Input::hasFile('file')){

            echo 'uploaded <br>';
            $file=Input::file('file');
            $file->move('uploads',$file->getClientOriginalName());
            echo '<img src="uploads/'.$file->getClientOriginalName().'"/>';

        }


    }

}