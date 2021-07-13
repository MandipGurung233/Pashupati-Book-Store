<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class bookController extends Controller
{
    public function index(){
        $book = Book::all();
        return view('book.index',compact('book'));
    }

    public function create(){
        return view('book.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'isbn_no' => 'required|unique:books',
            'title' => 'required',
            'author' => 'required',
            'detail' => 'required',
            'book_image' => 'required',
            'published_year' => 'required|integer',
            'price' => 'required',
        ]);


        $book = new Book();
        $book->isbn_no = $request->input('isbn_no');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->detail = $request->input('detail');
        if($request->hasfile('book_image')){
            $file = $request->file('book_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/books/',$filename);
            $book->book_image = $filename;
        }
        $book->published_year = $request->input('published_year');
        $book->price = $request->input('price');
        $book->save();
        return redirect()->back()->with('status','Book image added');
    }

    public function edit($id){
        $book = Book::find($id);
        return view('book.edit',compact('book'));
    }

    public function view($id){
        $book = Book::find($id);
        return view('book.view',compact('book'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'isbn_no' => 'required',
            'title' => 'required',
            'author' => 'required',
            'detail' => 'required',
            'book_image' => 'required',
            'published_year' => 'required|integer',
            'price' => 'required',
        ]);

        

        $book = Book::find($id);
        $book->isbn_no = $request->input('isbn_no');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->detail = $request->input('detail');
        
        if($request->hasfile('book_image')){
            $destination = 'uploads/books/'.$book->book_image;
            if(File::exists($destination)){
                File::delete($destination);
            }


            $file = $request->file('book_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/books/', $filename);
            $book->book_image = $filename;
        }
        $book->published_year = $request->input('published_year');
        $book->price = $request->input('price');
        $book->update();
        return redirect()->back()->with('status','Book updated');
    }

    public function destroy($id){
        $book = Book::find($id);
        $destination = 'uploads/books/'.$book->book_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $book->delete();
        return redirect()->back()->with('status','Book deleted');
    }

    



}
