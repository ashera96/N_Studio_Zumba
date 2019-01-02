<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['id','month','year','totalclasses','attendanceclasses','percentage'];
}
