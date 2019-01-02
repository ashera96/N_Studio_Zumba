<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    //
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id','package_id'];
}
