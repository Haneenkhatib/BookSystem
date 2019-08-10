<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{

    public function store(Request $request){
        $validate = validator::make($request->all(),$this->rules());
        $request['password'] = Hash::make($request->input('password'));

        $user=new User();
        $user->fill($request->all());
        if ($validate->fails()){
            return parent::error($validate->errors());
        }
        $user->save();
        return parent::success($user);
    }
    public function update(Request $request,$id){
        try {
            $user = User::findOrFail($id);
        } catch (\Exception $exception) {
            return parent::error("user not found ");
        }
        $validate = validator::make($request->all(),$this->rules($user->id));
        if ($request->hasFile('user_image')) {
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $user->image = parent::uploadImage($request->file('user_image'));
        }
        $user->fill($request->all());
        if ($validate->fails()){
            return parent::error($validate->errors());
        }
        $user->update();
        return parent::success($user);
    }
    public function destroy($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return parent::success($user);
        } catch (\Exception $exception) {
            return parent::error('User is not found');
        }
    }
    public function show($id=null){
        if (!$id){
            $users = User::all();
            return parent::success($users);
        }
        try{
            $user = User::findOrFail($id);
            return parent::success($user);
        }catch (ModelNotFoundException $modelNotFoundException){
            return parent::error('not found');
        }
        }
    private function rules($id=null){
        $rules=[
            'name'=>'required',
            'username'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ];
        if ($id) {
            $rules['email'] = 'required|unique:users,email,' . $id;
        } else {
            $rules['email'] = 'required|unique:users,email';
            $rules['user_image'] = 'nullable|mimes:jpeg,bmp,png,jpg';
        }
        return $rules;
    }
}
