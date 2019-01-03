<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;

class Weight extends Model
{
    use HasCompositePrimaryKey;
    protected $primaryKey=(['id','month','year']);
    protected $fillable = ['id','month','year','weight'];
}
