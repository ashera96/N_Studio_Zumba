<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    protected $fillable = ['name', 'email','nic','dob','address','tpno'];
}
