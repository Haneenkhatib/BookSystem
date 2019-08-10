<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use  App\User;
use Illuminate\Support\Facades\Mail;

const USER_PAGINATION=10;

class userController extends Controller
{
    public function index(Request $request,$num=USER_PAGINATION){
        $users=User::where([]);
        if($request->has('name'))
            $users=$users->where('name','like','%'.$request->input('name').'%');
        if($request->has('phone'))
            $users=$users->where('phone','like','%'.$request->input('phone').'%');
        if($request->has('email'))
            $users=$users->where('email','like','%'.$request->input('email').'%');
        if($request->has('username'))
            $users=$users->where('username','like','%'.$request->input('username').'%');
        $users=$users->paginate($num);
        return view('User.index',compact('users'));
    }
    public function destroy($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back()->with('success', 'User has been deleted successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'User is not found');
        }
    }
    public function edit($id){
        try {
            $user = User::findOrFail($id);
            return view('User.edit', compact('user'));
        } catch (\Exception $exception) {
            return redirect()->route('user.index')->with('error', 'User is not found');
        }
    }
    public function update(Request $request,$id){

        try {
            $user = User::findOrFail($id);
        } catch (\Exception $exception) {
            return redirect()->route('user.edit')->with('error', 'User is not found');
        }
        $request->validate($this->rules($user->id), $this->messages());
        if ($request->hasFile('user_image')) {
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $user->image = parent::uploadImage($request->file('user_image'));

        }
        $user->fill($request->all());
        $user->update();
        return redirect()->route('user.index')
            ->with('success',  'User has been updated successfully');

    }
    public function sendEmail($id){
        $user=User::findOrFail($id);
        Mail::to($user)->send(new WelcomeMail($user));
        return 'email send successfully';
    }
    public function viewProfile($id){
        try {
        $user=User::findOrFail($id);
        return view('User.profile', compact('user'));
        } catch (\Exception $exception) {
            return redirect()->route('user.index')->with('error', 'User is not found');
        }

    }
    public function viewRequests($id){
       $user= User::findOrFail($id);
        $requests=$user->requests;
        return view('User.viewR',compact('requests'));
    }
    public function userEnabled($id,$statues){
        $user=User::findOrFail($id);
        $user->enabled=$statues;
        $user->update();
    }

    public function rules($id = null){
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
    public function messages(){
        return[
            'name.required' => 'name is required',
            'username.required' => 'username is required',
            'phone.required' => 'phone is required',
            'email.required' => 'email is required',
            'email.unique' => 'duplicated field',
            'user_image.nullable' => 'image is optional',
            'user_image.mimes' => 'invalid image'
        ];

    }
}
