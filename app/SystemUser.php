<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SystemUser extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
       'id', 'username', 'email','password','role_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //newly added after pulling
    public function role(){
        return $this->belongsTo('App\Role');
    }


}
