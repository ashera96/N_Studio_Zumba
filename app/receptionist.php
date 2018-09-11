<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class receptionist extends Model
{
    protected $fillable = ['name', 'email','nic','dob','address','tpno'];
}
