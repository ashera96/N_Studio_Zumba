<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('static_pages.class_packages')->with('packages', $packages);
    }

    public function admin()
    {
        $packages = Package::all();
        return view('admin_panel.class_packages')->with('packages', $packages);
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
        return redirect('/dashboard/class_packages')->with('success','Package Created Successfully');
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
            'classes_to_cover'=>'required|string',
        ]);

        $new_package = Package::findOrFail($id);
        $new_package ->name =$request ->name;
        $new_package ->price =$request ->price;
        $new_package ->services =$request ->services;
        $new_package ->classes_to_cover =$request ->classes_to_cover;
        $new_package ->save();
        return redirect('/dashboard/class_packages')->with('success','Package Updated Successfully');
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
        $package->delete();
        return redirect('/dashboard/class_packages');
    }
}
