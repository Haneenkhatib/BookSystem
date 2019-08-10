<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

const ADMIN_PAGINATION=10;
class adminController extends Controller
{
    public function index(Request $request,$num=ADMIN_PAGINATION){
        $admins=\App\Admin::where([]);
        if($request->has('name'))
            $admins=$admins->where('name','like','%'.$request->input('name').'%');
        if($request->has('username'))
            $admins=$admins->where('username','like','%'.$request->input('username').'%');
        if($request->has('email'))
            $admins=$admins->where('email','like','%'.$request->input('email').'%');
        if($request->has('phone'))
            $admins=$admins->where('phone','like','%'.$request->input('phone').'%');
        $admins=$admins->paginate($num);
        return view('Admin.index',compact('admins'));
    }
    public function edit($id){
        try {
            $admin = Admin::findOrFail($id);
            return view('Admin.edit', compact('admin'));
        } catch (\Exception $exception) {
//            return redirect()->route('user.index')->with('error', 'User is not found');
        }
    }
    public function update(Request $request,$id){

        try {
            $admin = Admin::findOrFail($id);
        } catch (\Exception $exception) {
            return redirect()->route('admin.edit')->with('error', 'Admin is not found');
        }
        $request->validate($this->rules($admin->id), $this->messages());
        $admin->fill($request->all());
        $admin->update();
        return redirect()->route('admin.profile')
            ->with('success',  'Admin has been updated successfully');

    }
    public function home(){
        $requestsNum=\App\Request::all()->count();
        return view('Admin.dashboard',compact('requestsNum'));
    }
    public function viewProfile(){
        $admin=\Illuminate\Support\Facades\Auth::user();
        return view('Admin.profile',compact('admin'));
    }
    public function rules($id = null){
        $rules=[
            'name'=>'required',
            'username'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ];
        if ($id) {
            $rules['username'] = 'required|unique:admins,username,' . $id;
            $rules['phone'] = 'required|unique:admins,phone,' . $id;
            $rules['email'] = 'required|unique:admins,email,' . $id;
        } else {
            $rules['username'] = 'required|unique:admins,username';
            $rules['phone'] = 'required|unique:admins,phone';
            $rules['email'] = 'required|unique:admins,email';
        }
        return $rules;
    }
    public function messages(){
        return[
            'name.required' => 'name is required',
            'username.required' => 'username is required',
            'phone.required' => 'phone is required',
            'email.required' => 'email is required',
            'username.unique' => 'duplicated field',
            'phone.unique' => 'duplicated field',
            'email.unique' => 'duplicated field',
        ];

    }

}
