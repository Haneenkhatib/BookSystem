<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $primaryKey='id';
    protected $fillable =['title','content'];
    protected $with=['comments'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }


}
