<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weights extends Model
{
    protected $fillable = ['id','name','month','year','weight'];
}
