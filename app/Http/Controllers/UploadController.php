<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class UploadController extends Controller{

    public function upload(){

        if(Input::hasFile('file')){



            $files = File::files(public_path('uploads'));
            $filecount = 0;

            if ($files !== false) {
                $filecount = count($files);
            }


            $num=$filecount+1;


            // $num=count('uploads');
            $file=Input::file('file');
            // $file->move('uploads',$file->getClientOriginalName());
            $file->move('uploads',$num.'.png');


            //  echo '<img src=" {{ URL::asset(uploads/'.$file->getClientOriginalName().') }}  "/> ';

            Session::flash('msg10', 'Image successfully uploaded!'); //print flash msg after successfully created

            return redirect('admin/dashboard/admin_gallery');

        }


    }


}