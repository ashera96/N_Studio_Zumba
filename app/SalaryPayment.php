<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryPayment extends Model
{
    //
    protected $fillable = ['id','receptionist_id','amount','payment_status'];
}
