<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class videoController extends Controller
{
    public function create(){
//        dd(view('Search.view'));
        return view('Search.view');
    }
    public function search(Request $request){
        $validate = validator::make($request->all(),$this->rules());
        $query=$request->input('query');
        $q=explode(' ',$query);
        $videos = Video::where([]);
        foreach ($q as $string) {
            $videos = Video::where('name', 'like', '%' . $string . '%');
        }
        $pv = $videos->paginate(10);
        return view('Search.result',compact('pv'));
    }
    private function rules(){
        return [
            'query'=>'required',
            ];
    }

}
