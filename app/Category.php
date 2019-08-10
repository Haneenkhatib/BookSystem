<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table='category';
    protected $primarykey='id';
    protected $fillable=['image','lang','name'];
    protected $dates=['created_at','updated_at','deleted_at'];
    public function getImage(){
        if(!$this->image)
            return asset('no_img');
        return asset($this->image);
    }
}
