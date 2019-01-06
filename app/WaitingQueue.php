<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaitingQueue extends Model
{
    protected $fillable = [
        'id','schedule_id','user_id'
    ];
}
