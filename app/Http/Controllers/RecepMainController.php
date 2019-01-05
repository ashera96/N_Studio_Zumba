<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ageOfReceptionistValidation;
use App\Receptionist;
use App\Rules\ageValidation;
use App\Rules\nicValidation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\welcome;
use App\SystemUser;
use DB;
use App\UserPayment;
use App\Flag;

class RecepMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {




    }


    public function show_recep_dash()
    {
        return view('recep_panel.recep_dashboard');
    }

    public function show_fees()
    {
        return view('recep_panel.fees');
    }

    public function show_payments()
    {
//        Retrieving the current date
        $date_array = getdate();
        $day = $date_array['mday'];

        $flag = DB::table('flags')->select('value')->first();
//        dd($flag->value);

//        Checking if the start of month
//        If start of month, drop all entries from the user_payments table and add the current selections from users with their relevant package
//        This loop is executed once per month, and view is refreshed every day threough a javaacript method
        if( $day == 1 && $flag->value == 0 ){
//            Delete entries in user_payments table if any exists
            DB::table('user_payments') -> truncate(); //truncate - Auto-increment id is reassigned to 1

            $user_package_details = DB::table('user_packages')
                ->join('packages','user_packages.package_id','=','packages.id')
                ->select('user_packages.*','packages.*')
                ->get();

//            dd($user_package_details);

//            Creating a new set of entries with the latest selections from the user_packages table
            foreach ($user_package_details as $user_package_detail){
                $user_payments = new UserPayment;
                $user_payments -> user_id = $user_package_detail->user_id;
                $user_payments -> package_id = $user_package_detail->package_id;
                $user_payments -> amount = $user_package_detail->price;
                $user_payments -> payment_status = 0;
                $user_payments -> save();
            }

//            DB::table('flags')->where('id',1)->increment('value');
            $flags = Flag::findOrFail(1);
            $flags->value = 1;
            $flags->save();
        }
        elseif ( $day != 1 ){
            //DB::table('flags')->where('id',1)->decrement('value');

            $flags = Flag::findOrFail(1);
            $flags->value = 0;
            $flags->save();
        }

//        Retrieving user list for the current month
        $users=DB::table('user_payments')
            ->join('system_users','user_payments.user_id','=','system_users.id')
            ->select('system_users.*','user_payments.*')
            ->where('system_users.status','=',1)
            ->get();

        //retrieving user ids of those who had not paid
        $not_paid = DB::table('user_payments')
            ->select('user_id')
            ->where('payment_status','=',0)
            ->get();

        $not_paid_stack = [];

        foreach($not_paid as $np){
            array_push($not_paid_stack,$np->user_id);
        }
//        dd($not_paid_stack);



        return view('recep_panel.monthly_payments', compact('users','not_paid_stack'));
    }

    public function update_payment_status($id){

//        Updating the given user's payment_status in the user_payments table from 0 to 1 for the current month
        $user_payment = UserPayment::where('user_id','=',$id)->first();
        $user_payment -> payment_status = 1;
        $user_payment -> save();

//        Passing the flash message for success in the updating  process
        Session::flash('msg_paid', 'Payment Successfully Stored!');
        return redirect('/recep/payments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $recepfind = Receptionist::findOrFail($id);
        return view('admin_panel.edit',['receptionist'=>$recepfind]);

        $recepfind = SystemUser::findOrFail($id);
        return view('admin_panel.edit',['system_users'=>$recepfind]);
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
            'email'=>'required|email',
            'name'=>'required|string|min:2',
            'nic' => ['required',new nicValidation],
            'dob' => ['required',new ageOfReceptionistValidation],
            //'nic' => 'required|string|min:10|regex:/^[0-9]{2}[5-8]{1}[0-9]{6}[vVxX]$/',
            'address' => 'required',
            'tpno' => 'required|regex:/^[0]{1}[0-9]{9}$/',
        ]);

        $recepnew =Receptionist::findOrFail($id);
        $system_users = SystemUser::findOrFail($id);
        $recepnew ->name =$request ->name;
        //$recepnew ->email =$request ->email;
        $system_users ->email =$request ->email;
        $recepnew ->nic =$request ->nic;
        $recepnew ->dob =$request ->dob;
        $recepnew ->address =$request ->address;
        $recepnew ->tpno =$request ->tpno;
        $system_users ->status=true;
        $recepnew ->save();
        $system_users ->save();

        Session::flash('msgr2', 'Receptionist successfully updated!'); //print flash msg after successfully updated

        return redirect('admin/receptionist');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
