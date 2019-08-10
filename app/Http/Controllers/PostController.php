<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function show($id){
        $post=Post::findOrFail($id);
        return view('showPost',compact('post'));
    }
}
