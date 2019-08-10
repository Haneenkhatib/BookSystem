<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Category;

const CATEGORY_PAGINATION=10;

class categoryController extends Controller
{
    public function index(Request $request,$num=CATEGORY_PAGINATION){
//        $books=Book::paginate($num);
        $categories=Category::where([]);
        if($request->has('name'))
            $categories=$categories->where('name','like','%'.$request->input('name').'%');
        if($request->has('lang'))
            $categories=$categories->where('lang','like','%'.$request->input('lang').'%');
        $categories=$categories->paginate($num);
        return view('Category.index',compact('categories'));
    }
        public function create(){
        return view('Category.create');
    }
    public function store(Request $request){
        $request->validate($this->rules(),$this->messages());
        $uploadedImage=parent::uploadImage($request->file('category_image'));
        $category=new Category();
        $category->image=$uploadedImage;
        $category->fill($request->all());
        $category->save();
        return redirect()->back()->with('success','Category added successfully');
    }
    public function destroy($id){
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->back()->with('success', 'Category has been deleted successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Category is not found');
        }
    }
    public function edit($id){
        try {
            $category = Category::findOrFail($id);
            return view('Category.edit', compact('category'));
        } catch (\Exception $exception) {
            return redirect()->route('category.index')->with('error', 'Category is not found');
        }
    }
    public function update(Request $request,$id){
        try {
            $category = Category::findOrFail($id);
        } catch (\Exception $exception) {
            return redirect()->route('category.edit')->with('error', 'Category is not found');
        }
        $request->validate($this->rules($category->id), $this->messages());
        if ($request->hasFile('category_image')) {
            if (File::exists(public_path($category->image))) {
                File::delete(public_path($category->image));
            }
            $category->image = parent::uploadImage($request->file('category_image'));
        }
        $category->fill($request->all());
        $category->update();
        return redirect()->route('category.index')
            ->with('success', 'Category has been updated successfully');

    }

    public function rules($id = null){
        $rules=[
            'name'=>'required',
            'lang'=>'required'
        ];
        if (!$id) {
            $rules['category_image'] = 'required|mimes:jpeg,bmp,png,jpg';
        }
        return $rules;
    }
    public function messages(){
        return[
            'name.required' => 'name is required',
            'lang.required' => 'lang is required',
            'category_image.required' => 'image is required',
            'category_image.mimes' => 'invalid image'
        ];

    }
}
