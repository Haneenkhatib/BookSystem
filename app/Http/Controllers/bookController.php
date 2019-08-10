<?php

namespace App\Http\Controllers;

use App\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

const BOOK_PAGINATION=10;

class bookController extends Controller
{
    public function index(Request $request,$num=BOOK_PAGINATION){
        $books=Book::where([]);
        if($request->has('title'))
            $books=$books->where('title','like','%'.$request->input('title').'%');
        if($request->has('author'))
            $books=$books->where('author','like','%'.$request->input('author').'%');
        if($request->has('isbn'))
            $books=$books->where('isbn','like','%'.$request->input('isbn').'%');
        if($request->has('writer'))
            $books=$books->where('writer','like','%'.$request->input('writer').'%');
        if($request->has('publish_date'))
            $books=$books->where('publish_date','like','%'.$request->input('publish_date').'%');
        if($request->has('lang'))
            $books=$books->where('lang','like','%'.$request->input('lang').'%');
        $books=$books->paginate($num);
        return view('Book.index',compact('books'));
    }
    public function create(){
        return view('Book.create');
    }
    public static function sum($x,$y){
        return $x+$y;
    }
    public function store(Request $request){
        $request->validate($this->rules(),$this->messages());
        $uploadedImage=parent::uploadImage($request->file('book_image'));
        $book=new Book();
        $book->image=$uploadedImage;
        $request['publish_date']=Carbon::now();
        $book->fill($request->all());
        $book->save();
        return redirect()->back()->with('success','book added successfully');
    }
    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return redirect()->back()->with('success', 'book has been deleted successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Book is not found');
        }
    }
    public function edit($id){
        try {
            $book = Book::findOrFail($id);
            return view('Book.edit', compact('book'));
        } catch (\Exception $exception) {
            return redirect()->route('book.index')->with('error', 'Book is not found');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (\Exception $exception) {
            return redirect()->route('book.edit')->with('error', 'Book is not found');
        }
        $request->validate($this->rules($book->id), $this->messages());
        if ($request->hasFile('book_image')) {
            if (File::exists(public_path($book->image))) {
                File::delete(public_path($book->image));
            }
            $book->image = parent::uploadImage($request->file('book_image'));

        }
        $book->fill($request->all());
        $book->update();
        return redirect()->route('book.index')
            ->with('success',  'book has been updated successfully');

    }

    public function rules($id = null){
       $rules=[
            'title'=>'required',
            'publisher'=>'required',
            'writer'=>'required',
            'author'=>'required',
            'publish_date'=>'required',
            'isbn'=>'required',
            'lang'=>'required',
            'category_id'=>'required',
            'library_id'=>'required'
        ];
        if ($id) {
            $rules['isbn'] = 'required|unique:books,isbn,' . $id;
        } else {
            $rules['isbn'] = 'required|unique:books,isbn';
            $rules['book_image'] = 'required|mimes:jpeg,bmp,png,jpg';
        }
        return $rules;
    }
    public function messages(){
        return[
            'title.required' => 'title is required',
            'author.required' => 'author is required',
            'publisher.required' => 'publisher is required',
            'writer.required' => 'writer is required',
            'isbn.required' => 'isbn is required',
            'lang.required' => 'lang is required',
            'category_id.required' => 'category_id is required',
            'library_id.required' => 'library_id is required',
            'isbn.unique' => 'duplicated field',
            'publish_date.required' => 'publish_date is required',
            'book_image.required' => 'image is required',
            'book_image.mimes' => 'invalid image'        ];

    }
}
