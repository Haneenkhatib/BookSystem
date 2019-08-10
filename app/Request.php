<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;
    protected $table='requests';
    protected $primarykey='id';
    protected $fillable=['request_identifier','book_amount','book_id','user_id','statues'];
    protected $dates=['created_at','updated_at','deleted_at','delivery_time'];

}
