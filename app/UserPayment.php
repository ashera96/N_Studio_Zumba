<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    //
    protected $fillable = ['id','user_id','package_id','amount','payment_status'];
}
