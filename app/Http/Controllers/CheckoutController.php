<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\SalaryPayment;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $customer = Customer::create(array(
            'email' => $request->stripeEmail,
            'source'  => $request->stripeToken
        ));

        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $request->amount,
            'currency' => 'usd'
        ));

        $salary_payment = SalaryPayment::where('receptionist_id','=',$request->receptionist_id)
            ->first()
            ->update(['payment_status'=>1]);

//        Flash message for success in payment
        Session::flash('msg_success', 'Salary Payment Successful!');
        return redirect('/admin/payments');

    }
}