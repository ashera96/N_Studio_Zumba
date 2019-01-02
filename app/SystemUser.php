<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


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

//functions to check the user roles
    public function checkAdmin(){
        $role_id = Auth::user()->role->id;

        if($role_id==1){
            return true;
        }
        return false;
    }

    public function checkCustomer(){
        $role_id = Auth::user()->role->id;

        if($role_id==2){
            return true;
        }
        return false;
    }

    public function checkReceptionist(){
        $role_id = Auth::user()->role->id;

        if($role_id==3){
            return true;
        }
        return false;
    }

    public function isOnline(){
        return Cache::has('user-is-online-'.$this->role->id);
    }

}
