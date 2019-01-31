<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\UserPackage;
use Illuminate\Support\Facades\Session;
use DB;
use Mail;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve only entries which have status 0
        $packages = Package::all()->where('status','=',0);
        return view('static_pages.class_packages')->with('packages', $packages);
    }

    public function admin()
    {
        // Retrieve only entries which have status 0
        $packages = Package::all()->where('status','=',0);
        return view('admin_panel.class_packages')->with('packages', $packages);
    }

    public function customer()
    {
        // Retrieve only entries which have status 0
        $packages = Package::all()->where('status','=',0);
        return view('customer_pages.class_packages',compact('packages'));
    }

    public function delete($id)
    {
        // Make the status column of the packages table for this entry 1
        $package = Package::find($id);
        $package -> status = 1;

        if($package -> save()) {

            $package_name = DB::table('packages')->select('name')->where('id',$id)->first();
            //$package_id = DB::table('packages')->select('name')->where('id',$id)->first();

            $data = [
                'package_name' => $package_name->name,
            ];

            Mail::send('email.notifyDelPkg', $data, function ($del) use ($id,$data) {
                //$current_user = Auth::user();

                $users=DB::table('system_users')
                    ->join('user_packages','system_users.id','=','user_packages.user_id')
                    ->select('system_users.*','user_packages.*')
                    ->where('user_packages.package_id',$id)
                    ->get();

                foreach ($users as $u) {

                    $del->bcc($u->email); //for hide others email addresses
                    $del->subject('Class Package Notification');
                }

            });

        }

        // Remove all current selection entries from user_packages table if it includes the deleted package
        $user_packages = DB::table('user_packages')
            ->where('package_id','=',$id)
            ->get();
//        dd($user_packages);

        // If count is >0 delete all related entries
        if(count($user_packages)>0){
            for( $i=0;$i<count($user_packages);$i++ ){
//            dd($user_packages[$i]->user_id);
                $user_package = UserPackage::findOrFail($user_packages[$i]->user_id);
                $user_package->delete();

            }
        }

        // FLash message for success in deletion
        Session::flash('msg_deleted', 'Class Package Deleted Successfully!');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.class_package_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'price'=>'required|string',
            'services'=>'required|string',
            'classes_to_cover'=>'required',
        ]);


        $new_package = new Package;
        $new_package ->name =$request ->name;
        $new_package ->price =$request ->price;
        $new_package ->services =$request ->services;
        $new_package ->classes_to_cover =$request ->classes_to_cover;
        $new_package ->save();
        Session::flash('msg_created', 'Class Package Created Successfully!');
        return redirect('/admin/dashboard/class_packages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
//        return view('index.class_packages.{{$package->id}}.edit')->with('package', $package);
        return view('admin_panel.class_package_edit')->with('package', $package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'price'=>'required|string',
            'services'=>'required|string',
            'classes_to_cover'=>'required',
        ]);

        $new_package = Package::findOrFail($id);
        $new_package ->name =$request ->name;
        $new_package ->price =$request ->price;
        $new_package ->services =$request ->services;
        $new_package ->classes_to_cover =$request ->classes_to_cover;
        $new_package ->save();
        Session::flash('msg_updated', 'Class Package Updated Successfully!');
        return redirect('/admin/dashboard/class_packages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Respons
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package -> delete();
        Session::flash('msg_deleted', 'Class Package Deleted Successfully!');
        return redirect('/admin/dashboard/class_packages');
    }
}
