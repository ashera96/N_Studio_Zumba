<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleCount extends Model
{
    protected $fillable = ['id','schedule_id','counter'];
}
