<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $primaryKey='id';
    protected $fillable = [
        'name', 'email', 'password','username','phone','image','enabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates=['	created_at','updated_at','deleted_at'];

    public function requests(){
        return $this->hasMany(Request::class,'user_id','id');
    }
    public function RequestCount($id){
        $count=0;
        $requests=$this::findOrFail($id);
        foreach ($requests->requests as $request){
            $count++;
        }
        return $count;
    }
    public function getImage(){
        if(!$this->image)
            return asset('no_img');
        return asset($this->image);
    }
}
