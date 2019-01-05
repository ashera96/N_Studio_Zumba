<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receptionist;
use App\SystemUser;
use DB;

class PaymentController extends Controller
{
    public function load_receptionists()
    {
        $receptionists =DB::table('receptionists')
            ->join('system_users','receptionists.id','=','system_users.id')
            ->select('system_users.*','receptionists.*')
//            ->where('system_users.status','=',1)
            ->get();

//        dd($receptionists);

        return view('admin_panel.payment', ['receptionists' => $receptionists]);
    }
}
