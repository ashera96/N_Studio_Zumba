<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SystemUser;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    //make the relationship with SystemUser model
    public function users(){
        return $this->hasMany('App\SystemUser');
    }

}
