<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Auth;


class Admin extends Auth
{
    use SoftDeletes;

    protected $table='admins';
    protected $primaryKey='id';
    protected $fillable = [
        'name', 'username', 'password','email','phone'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates=[
        'created_at','updated_at','deleted_at'
    ];
}
