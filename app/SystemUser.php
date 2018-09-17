<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\SystemUser as Authenticatable;

class SystemUser extends Model
{
    use Notifiable;
    protected $fillable = [
       'id', 'username', 'email','password','role_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
