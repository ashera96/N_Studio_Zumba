<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;

class Attendance extends Model
{
    use HasCompositePrimaryKey;
    protected $primaryKey=(['id','month','year']);
    protected $fillable = ['id','month','year','totalclasses','attendanceclasses','percentage'];
}
