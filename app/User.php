<?php

namespace App;

//use Illuminate\Filesystem\Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

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

   // public function isOnline(){
     //   return Cache::has('user-is-online-'.$this->id);
    //}
}
