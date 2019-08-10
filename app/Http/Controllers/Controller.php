<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function userLogout(){
//        Auth::logout();
//        return redirect()->route('login');
    }

    public function uploadImage($img,$dir='image'){
        $uploadedImage = $img;
        $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
        $direction = public_path($dir . '/');
        $uploadedImage->move($direction, $imageName);
        return 'image/' . $imageName;
    }
    public function success($data,$statues=200){
        return response()->json(
            [
                'statues'=>'success',
                'data'=>$data,
                'error'=>0
            ]
        )->header('content_type','application/json');
    }
    public function error($data,$statues=500){
        if($data instanceof MessageBag)
             return $data->first();
        return response()->json(
            [
                'statues'=>'error',
                'data'=>$data,
                'error'=>1
            ]
        )->header('content_type','application/json');
    }
}
