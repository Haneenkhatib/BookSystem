<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='books';
    protected $primarykey='id';
    protected $fillable=['author','writer','publisher','publish_date','isbn','image','title','lang','category_id','library_id'];
    protected $dates=['created_at','updated_at','deleted_at'];
    public function getImage(){
        if(!$this->image)
            return asset('no_img');
        return asset($this->image);
    }
}
