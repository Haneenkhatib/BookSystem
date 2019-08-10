<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Library extends Model
{
    use SoftDeletes;
    protected $table='library';
    protected $primarykey='id';
    protected $fillable=['name','phone','fax','image','address','lang','email'];
    protected $dates=['	created_at','updated_at','deleted_at'];
    public function getImage(){
        if(!$this->image)
            return asset('no_img');
        return asset($this->image);
    }
}
