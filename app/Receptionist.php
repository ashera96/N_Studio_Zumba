<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Receptionist extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','nic','dob','address','tpno',
    ];

    /*protected $hidden = [
        'password', 'remember_token',
    ]; */

    //make the relationship with Role-model
    public function role(){
        return $this->belongsTo('App\Role');
    }

}
