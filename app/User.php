<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','nic','dob','address','contactno',
    ];

 /*   protected $hidden = [
        'password', 'remember_token',
    ]; */

    //Make the relationship with the Model-Role
   public function role(){
        return $this->belongsTo('App\Role');
    }
}
