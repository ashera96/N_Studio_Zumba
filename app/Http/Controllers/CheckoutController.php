<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\UserPayment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
            'amount'   => ($request->amount)*0.0055*100, // Rupees to LKR
            'currency' => 'usd'
        ));

        $user_payment = UserPayment::where('user_id','=',Auth::user()->id)
            ->first()
            ->update(['payment_status'=>1]);

//        Flash message for success in payment
        Session::flash('msg_success', 'Payment Successful');
        return redirect('/home/payment');

    }
}