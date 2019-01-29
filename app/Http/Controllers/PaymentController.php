<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receptionist;
use App\SystemUser;
use DB;
use App\Flag;
use Mail;
use App\SalaryPayment;
use App\Mail\unpaidSalaryReport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Function to load the active receptionists as of the start of the month and manage payments month wise
    public function load_receptionists()
    {
        //Retrieving the current date
        $date_array = getdate();
        $day = $date_array['mday'];//Current day

        //Flag to check day 1
        $flag = DB::table('flags')->select('value')->where('id',3)->first();

        // get() -> collection is retrieved
        // first() -> associative array is retrieved

        // Retrieving the eligible receptionists for the current month to pass to the view
        $eligible_receptionists = DB::table('salary_payments')
            ->join('receptionists','salary_payments.receptionist_id','=','receptionists.id')
            ->select('receptionists.*','salary_payments.*')
            ->get();

        // Retrieving receptionist_id of those who did not receive their salary
        $no_salary = DB::table('salary_payments')
            ->join('receptionists','receptionists.id','=','salary_payments.receptionist_id')
            ->select('receptionist_id')
            ->where('payment_status','=',0)
            ->get();

        //Converting the collection to an associative array
        $no_salary_array = [];
        foreach ($no_salary as $ns){
            array_push($no_salary_array,$ns->receptionist_id);
        }
//        dd($no_salary_array);

        // Checking if the start of month
        // If start of month send email to admin with the list of unpaid active receptionists within current table
        // Drop all entries from the salary_payments table and add the currently active receptionists
        // This loop will execute once per month
        if ($day == 1 && $flag->value == 0) {
            // Sending an email to the admin with a list of active receptionists who did not receive salary payments

            // Retrieving the receptionists who did not receive a salary ( before dropping the table entries)
            $no_salary_email_list = DB::table('salary_payments')
                ->join('receptionists','receptionists.id','=','salary_payments.receptionist_id')
                ->select('receptionists.name')
                ->where('salary_payments.payment_status','=',0)
                ->get();
//            dd($no_salary_email_list);

            // Variable to pass to the email function - $data (associative array)
            $data_name = [];
            foreach ($no_salary_email_list as $ns){
                array_push($data_name,$ns->name);
            }
            $data = ['name' => $data_name];
//            dd($data);

            // Sending mail to admin
            Mail::send('email.unpaid_salary_report',$data,function($report)use($data){
                $admin = DB::table('system_users')
                    ->where('role_id',1)
                    ->first();
                $report -> to($admin->email);
                $report -> subject('List of Receptionists who did not receive their salary for the month of '.date('F'));
            });


            // Delete entries in salary_payments table if any exists
            DB::table('salary_payments') -> truncate(); // truncate - Auto-increment id is reassigned to 1

            // Retrieving the receptionists who are active as of the 1st of the month
            $active_receptionists =DB::table('receptionists')
                ->join('system_users','receptionists.id','=','system_users.id')
                ->select('system_users.*','receptionists.*')
                ->where('system_users.status','=',1)
                ->get();

//            dd($active_receptionists);


            // Creating new set of entries with the active receptionists
            foreach ($active_receptionists as $receptionist){
                $salary_payment = new SalaryPayment;
                $salary_payment -> receptionist_id = $receptionist->id;
                $salary_payment -> amount = 50;
                $salary_payment -> payment_status = 0;
                $salary_payment -> save();
            }

            // Assigning the flag to be 1 so that cannot be executed again within the same month same day twice
            $flag_obj = Flag::findOrFail(3);
            $flag_obj -> value = 1;
            $flag_obj -> save();

//            Flash message for success in table updation for current month
            Session::flash('msg_updated', 'Receptionist list updated successfully for the current month!');
        }

        elseif ( $day != 1 ){
            // If any day other than 1 make the flag variable 0
            $flag_obj = Flag::findOrFail(3);
            $flag_obj -> value = 0;
            $flag_obj -> save();
        }




        return view('admin_panel.payment', compact('eligible_receptionists','no_salary_array'));
    }

    public function update_payment_status($id){
        //Updating the given receptionist's payment_status in the salary_payments table from 0 to 1 for the current month
        $salary_payment = SalaryPayment::where('receptionist_id','=',$id)->first();
        $salary_payment -> payment_status = 1;
        $salary_payment -> save();

        // Passing the flash message for success in the updating process
        Session::flash('msg_paid', 'Payment Successfully Stored');
        return redirect('/admin/payments');
    }

    public function show_payment(){

        $current_user = Auth::user()->id;
        $user_payment =DB::table('user_payments')
            ->join('packages','user_payments.package_id','=','packages.id')
            ->select('user_payments.*','packages.*')
            ->where('user_payments.user_id','=',$current_user)
            ->get();
//        dd($user_payment);

        return view('customer_pages.package_payment',compact('user_payment'));
    }

}
