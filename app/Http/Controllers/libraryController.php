<?php

namespace App\Http\Controllers;

use App\Library;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const LIBRARY_PAGINATION=10;

class libraryController extends Controller
{
    public function index(Request $request,$num=LIBRARY_PAGINATION){
        $libraries=Library::where([]);
        if($request->has('name'))
            $libraries=$libraries->where('name','like','%'.$request->input('name').'%');
        if($request->has('lang'))
            $libraries=$libraries->where('lang','like','%'.$request->input('lang').'%');
        if($request->has('phone'))
            $libraries=$libraries->where('phone','like','%'.$request->input('phone').'%');
        if($request->has('email'))
            $libraries=$libraries->where('email','like','%'.$request->input('email').'%');
        if($request->has('fax'))
            $libraries=$libraries->where('fax','like','%'.$request->input('fax').'%');
        if($request->has('address'))
            $libraries=$libraries->where('address','like','%'.$request->input('address').'%');
        $libraries=$libraries->paginate($num);
        return view('Library.index',compact('libraries'));
    }
    public function create(){
        return view('Library.create');
    }
    public function store(Request $request){
        $request->validate($this->rules(),$this->messages());
        $uploadedImage=parent::uploadImage($request->file('library_image'));
        $library=new Library();
        $library->image=$uploadedImage;
        $library->fill($request->all());
        $library->save();
        return redirect()->back()->with('success','Library added successfully');
    }
    public function destroy($id){
        try {
            $library = Library::findOrFail($id);
            $library->delete();
            return redirect()->back()->with('success', 'Library has been deleted successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Library is not found');
        }
    }
    public function edit($id){
        try {
            $library = Library::findOrFail($id);
            return view('Library.edit', compact('library'));
        } catch (\Exception $exception) {
            return redirect()->route('library.index')->with('error', 'Library is not found');
        }
    }
    public function update(Request $request,$id){
        try {
            $library = Library::findOrFail($id);
        } catch (\Exception $exception) {
            return redirect()->route('library.edit')->with('error', 'Library is not found');
        }
        $request->validate($this->rules($library->id), $this->messages());
        if ($request->hasFile('library_image')) {
            if (File::exists(public_path($library->image))) {
                File::delete(public_path($library->image));
            }
            $library->image = parent::uploadImage($request->file('library_image'));
        }
        $library->fill($request->all());
        $library->update();
        return redirect()->route('library.index')
            ->with('success', 'Library has been updated successfully');

    }

    public function rules($id = null){
        $rules=[
            'name'=>'required',
            'lang'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'fax'=>'required',
            'address'=>'required',
        ];
        if ($id) {
            $rules['phone'] = 'required|unique:library,phone,' . $id;
            $rules['email'] = 'required|unique:library,email,' . $id;
            $rules['fax'] = 'required|unique:library,fax,' . $id;

        }else{
            $rules['phone'] = 'required|unique:library,phone';
            $rules['email'] = 'required|unique:library,email';
            $rules['fax'] = 'required|unique:library,fax';
            $rules['library_image'] = 'required|mimes:jpeg,bmp,png,jpg';
        }
        return $rules;
    }
    public function messages(){
        return[
            'name.required' => 'name is required',
            'lang.required' => 'lang is required',
            'phone.required' => 'phone is required',
            'email.required' => 'email is required',
            'fax.required' => 'fax is required',
            'phone.unique' => 'duplicated field',
            'email.unique' => 'duplicated field',
            'fax.unique' => 'duplicated field',
            'address.required' => 'address is required',
            'library_image.required' => 'image is required',
            'library_image.mimes' => 'invalid image'
        ];

    }
}
