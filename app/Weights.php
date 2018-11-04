<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weights extends Model
{
    protected $fillable = ['id','month','year','user_weight'];
}
