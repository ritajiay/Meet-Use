<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermodel extends Model
{
    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';
    const ROLE_USER = 'user';

    protected $fillable =[
        'userid','password','username','phone','email','role','remember_token'
    ];

    protected $hidden = ['password', 'remember_token'];
}
