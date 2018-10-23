<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SystemUser extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','username','email','password','status','role_id'
    ];


       protected $hidden = [
           'password', 'remember_token',
       ];

    //Make the relationship with the Model-Role
    public function role(){
        return $this->belongsTo('App\Role');
    }
}
