<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

const REQUEST_PAGINATION=10;

class requestController extends Controller
{
    public function index(Request $request,$num=REQUEST_PAGINATION){
        $requests=\App\Request::where([]);
        if($request->has('request_identifier'))
            $requests=$requests->where('request_identifier','like','%'.$request->input('request_identifier').'%');
        if($request->has('book_amount'))
            $requests=$requests->where('book_amount','like','%'.$request->input('book_amount').'%');
        if($request->has('book_id'))
            $requests=$requests->where('book_id','like','%'.$request->input('book_id').'%');
        if($request->has('user_id'))
            $requests=$requests->where('user_id','like','%'.$request->input('user_id').'%');
        $requests=$requests->paginate($num);
        return view('Request.index',compact('requests'));
    }
    public function userProfile($id){
        $user=User::findOrFail($id);
         return redirect()->route('user.profile',['id'=>$user->id]);
    }

}
