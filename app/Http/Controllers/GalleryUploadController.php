<?php

namespace App\Http\Controllers;

use App\GalleryUpload;
use Illuminate\Http\Request;
use DB;
use Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class GalleryUploadController extends Controller
{

    public function index()
    {
        $images = DB::table('gallery_uploads')->select('*')->paginate(5);
        return view('admin_panel.admin_gallery',compact('images'));
    }


    public function store(Request $request)  //store posts in the db
    {
        /*$this->validate($request,[
            'image'=>'required|image|mimes:jpg,png|max:4096',
        ]);

        $gal_upload = new GalleryUpload;

        if($request->hasFile('image')){
            $image = $request->file('image');

            $files = File::files(public_path('uploads'));
            $filecount = 0;

            if ($files !== false) {
                $filecount = count($files);
            }
            $num = $filecount + 1;

            $ext = $image->getClientOriginalExtension();


            if($ext == '.jpg'){
                $location = public_path('uploads/'.$num.'.png');
                $filename = $num.'.png';
            }else {
                $location = public_path('uploads/' .$num.$ext);
                $filename = $num.'.'.$image->getClientOriginalExtension();
            }

            Image::make($image)->save($location);
            $gal_upload->image = $filename;
        }

        $gal_upload ->save();

        Session::flash('msg_upload_success', 'Image successfully uploaded!');

        return redirect()->back();
        */
        $this->validate($request,[
            'image'=>'required|image|max:2096',
        ]);

        if (Input::hasFile('image')) {
            $ext = Input::file('image')->getClientOriginalExtension();
            if ($ext == 'png' || $ext == 'jpg') {
                $files = File::files(public_path('uploads'));
                $filecount = 0;

                if ($files !== false) {
                    $filecount = count($files);
                }
                $num = $filecount + 1;
                $file = Input::file('image');
                $file->move('uploads', $num . '.png');

                $gal_upload = new GalleryUpload;

                $gal_upload->image = $num. '.png';

                $gal_upload->save();

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

    public function destroy($id) //delete posts
    {
        $image_find = GalleryUpload::findOrFail($id);
        $image_find->delete();
        //$image_path = app_path('uploads'.$image_find->image);
        //unlink($image_path);
        File::delete('uploads/' . $image_find->image);
        Session::flash('msgdel', 'Image Deleted Successfully!');
        return redirect()->back();
    }

}
