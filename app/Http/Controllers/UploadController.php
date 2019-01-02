<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class UploadController extends Controller{

    public function upload(){

        if(Input::hasFile('file')){

            $file=Input::file('file');
            $file->move('uploads',$file->getClientOriginalName());


          //  echo '<img src=" {{ URL::asset(uploads/'.$file->getClientOriginalName().') }}  "/> ';

            Session::flash('msg10', 'Image successfully uploaded!'); //print flash msg after successfully created

            return redirect('admin/dashboard/admin_gallery');

        }


    }


}