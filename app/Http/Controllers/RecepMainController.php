<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\ScheduleCount;
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
use App\Mail\paymentDelayAlert;

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
        $users=SystemUser::all();
        $custs=SystemUser::all()->where('status','=',1);
        $new=DB::table('users')
            ->join('system_users','users.id','=','system_users.id')
            ->select('system_users.*','users.*')
            ->get();
        return view('recep_panel.recep_dashboard',compact('users'),compact('custs'));
    }

    public function show_fees()
    {
        return view('recep_panel.fees');
    }

    public function show_schedules()
    {
        $schedule_monday = Schedule::all()->where('day','=','Monday');
        $schedule_tuesday = Schedule::all()->where('day','=','Tuesday');
        $schedule_wednesday = Schedule::all()->where('day','=','Wednesday');
        $schedule_thursday = Schedule::all()->where('day','=','Thursday');
        $schedule_friday = Schedule::all()->where('day','=','Friday');
        $schedule_saturday = Schedule::all()->where('day','=','Saturday');
        $schedule_sunday = Schedule::all()->where('day','=','Sunday');

        $schedule_limit = Schedule::select('client_limit')->where('id',1)->first();
        $schedule_monday1_count = ScheduleCount::select('counter')->where('schedule_id',1)->first();
        $schedule_monday2_count = ScheduleCount::select('counter')->where('schedule_id',2)->first();
        $schedule_tuesday1_count = ScheduleCount::select('counter')->where('schedule_id',3)->first();
        $schedule_tuesday2_count = ScheduleCount::select('counter')->where('schedule_id',4)->first();
        $schedule_wednesday1_count = ScheduleCount::select('counter')->where('schedule_id',5)->first();
        $schedule_wednesday2_count = ScheduleCount::select('counter')->where('schedule_id',6)->first();
        $schedule_thursday1_count = ScheduleCount::select('counter')->where('schedule_id',7)->first();
        $schedule_thursday2_count = ScheduleCount::select('counter')->where('schedule_id',8)->first();
        $schedule_friday1_count = ScheduleCount::select('counter')->where('schedule_id',9)->first();
        $schedule_friday2_count = ScheduleCount::select('counter')->where('schedule_id',10)->first();
        $schedule_saturday_count = ScheduleCount::select('counter')->where('schedule_id',11)->first();
        $schedule_sunday_count = ScheduleCount::select('counter')->where('schedule_id',12)->first();

        return view('recep_panel.schedule_counts', compact('schedule_monday', 'schedule_tuesday', 'schedule_wednesday', 'schedule_thursday', 'schedule_friday', 'schedule_saturday', 'schedule_sunday',
            'schedule_monday1_count','schedule_limit',
            'schedule_monday2_count','schedule_tuesday1_count',
            'schedule_tuesday2_count','schedule_wednesday1_count',
            'schedule_wednesday2_count','schedule_thursday1_count',
            'schedule_thursday2_count','schedule_friday1_count',
            'schedule_friday2_count','schedule_saturday_count',
            'schedule_sunday_count'
        ));
    }








    public function show_payments()
    {
//        Retrieving the current date
        $date_array = getdate();
        $day = $date_array['mday'];//Current day

//        Flag to check day 1
        $flag = DB::table('flags')->select('value')->where('id',1)->first();
//        dd($flag->value);

        // get() -> collection is retrieved
        // first() -> associative array is retrieved

//        Flag to check day 10
        $flag_alerts = DB::table('flags')->select('value')->where('id',2)->first();


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

        // Converting the collection to an associative array
        $not_paid_stack = [];

        foreach($not_paid as $np){
            array_push($not_paid_stack,$np->user_id);
        }
//        dd($not_paid_stack);


//        Checking if the start of month
//        If start of month send email to admin with the list of unpaid customers
//        Drop all entries from the user_payments table and add the current selections from users with their relevant package
//        This loop is executed once per month, and view is refreshed every day through a javascript method
        if( $day == 1 && $flag->value == 0 ){

//            Sending an email to the admin for the previous month's non settled payments of customers

//            Retrieving the users who haven't paid (before dropping the tables entries)
            $not_paid_list = DB::table('users')
                ->join('user_payments','users.id','=','user_payments.user_id')
                ->select('user_payments.*','users.*')
                ->where('user_payments.payment_status','=',0)
                ->get();
//            dd($not_paid_list);

//            Variable to pass to the email function - $data
            $data_name = [];
            $data_amount = [];
            $count_list = count($not_paid_list);
            if($count_list>0){
                for( $i=0 ; $i<$count_list ; $i++ ){
                    array_push($data_name,$not_paid_list[$i]->name);
                    array_push($data_amount,$not_paid_list[$i]->amount);
                }
            }

            // Forming the associative array
            $data = [
                'name' => $data_name,
                'amount' => $data_amount
            ];
//            dd($data);

            //Sending mail to admin
            Mail::send('email.payment_delay_report',$data,function($report)use($data){
                $admin = DB::table('system_users')
                    ->where('role_id',1)
                    ->first();
                $report->to($admin->email);
                $report->subject('Payment delay list for the month of '.date('F'));
            });



//            Delete entries in user_payments table if any exists
            DB::table('user_payments') -> truncate(); // truncate - Auto-increment id is reassigned to 1

            $user_package_details = DB::table('user_packages')
                ->join('packages','user_packages.package_id','=','packages.id')
                ->select('user_packages.*','packages.*')
                ->get();

//            dd($user_package_details);

//            Creating a new set of entries with the latest selections from the user_packages table for each user
            foreach ($user_package_details as $user_package_detail){
                $user_payments = new UserPayment;
                $user_payments -> user_id = $user_package_detail->user_id;
                $user_payments -> package_id = $user_package_detail->package_id;
                $user_payments -> amount = $user_package_detail->price;
                $user_payments -> payment_status = 0;
                $user_payments -> save();
            }

            // Assigning flag to be 1 so that cannot be executed again within the same month same day twice
//            DB::table('flags')->where('id',1)->increment('value');
            $flags = Flag::findOrFail(1);
            $flags->value = 1;
            $flags->save();
        }
        elseif ( $day != 1 ){
            // If any day which is not 1 make the flag variable 0
            //DB::table('flags')->where('id',1)->decrement('value');

            $flags = Flag::findOrFail(1);
            $flags->value = 0;
            $flags->save();
        }



//      Sending payment delay alerts on 10th to customers who have not made the due payment
        if ($day == 10 && $flag_alerts->value == 0 ){

            $not_paid_email_stack = [];

            foreach ($not_paid_stack as $not_paid_id){
                $payment_delayed_user = SystemUser::findOrFail($not_paid_id);
                $this->payment_delay_email($payment_delayed_user);
            }

            // Assigning flag_alert to be 1 so that cannot be executed again within the same month same day twice
            $flag_alert = Flag::findOrFail(2);
            $flag_alert->value = 1;
            $flag_alert->save();
        }

        elseif( $day != 10){
            // If any day which is not 10 make the flag_alert variable 0
            $flag_alert = Flag::findOrFail(2);
            $flag_alert->value = 0;
            $flag_alert->save();
        }


        return view('recep_panel.monthly_payments', compact('users','not_paid_stack'));
    }

//    Function to send Email - Payment Delay alert to all customers who have not paid the monthly payment
    public function  payment_delay_email($payment_delayed_user){
        Mail::to($payment_delayed_user['email'])->send(new paymentDelayAlert($payment_delayed_user));
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
