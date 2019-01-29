<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class UploadController extends Controller{

    public function upload(){

        if (Input::hasFile('file')) {
            $ext = Input::file('file')->getClientOriginalExtension();
            if ($ext == 'png' || $ext == 'jpg') {
                $files = File::files(public_path('uploads'));
                $filecount = 0;

                if ($files !== false) {
                    $filecount = count($files);
                }
                $num = $filecount + 1;
                $file = Input::file('file');
                $file->move('uploads', $num . '.png');

                Session::flash('msg_upload_success', 'Image successfully uploaded!'); //print flash msg after successfully created
                return redirect('admin/dashboard/admin_gallery');
            }
            else {
                Session::flash('msg_upload_fail', 'Image format not supported! Failed to Upload Image'); //print flash msg when not successfully uploaded
                return redirect('admin/dashboard/admin_gallery');
            }
        }
        else{
            Session::flash('msg_upload_no', 'No image selected!  Please select an image'); //print flash msg when no image selected
            return redirect('admin/dashboard/admin_gallery');
        }
    }
}