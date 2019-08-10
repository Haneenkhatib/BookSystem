<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table='videos';
    protected $primaryKey='id';
    protected $fillable=['name','url','description'];
}
