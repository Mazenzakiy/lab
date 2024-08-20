<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    //

    public function index()
    {
        // select * from books
        $books = Book::paginate(2);

        // dd($books);

        return view('books/index', [
            'books' => $books
        ]);
    }

    public function show($id)
    {
        // select * from book where id=$id
        $book = Book::findOrFail($id);
        return view('books.show', [
            'book' => $book
        ]);
    }


    public function create()
    {
        $cats= Cat::select('id', 'name')->get();

        return view('books.create',[
            'cats'=>$cats
        ]);
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img'  => 'required|image|max:1012|mimes:jpg,jpeg,png',
            'price'=> 'required|numeric|max:9999.99',
            'cat_id'=> 'required|exists:cats,id',
        ]);


        $imagePath = Storage::putFile('books', $request->img);

        Book::create([
            'name'  => $request->name,
            'desc'  => $request->desc,
            'img'   => $imagePath,
            'price' =>$request->price,
            'cat_id'=>$request->cat_id,
        ]);

        return redirect(url('/books'));
    }

    public function edit($id)
    {
        $cats = Cat::all();
        $book = Book::findOrFail($id);
        // dd($cat);
        return view('books/edit', [
            'book' => $book,
            'cats' => $cats,
        ]);
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'nullable|image|max:1012|mimes:jpg,jpeg,png',
            'price'=> 'required|numeric|max:9999.99',
            'cat_id'=> 'required|exists:cats,id',
        ]);

        $book = Book::findOrFail($id);

        $imagePath = $book->img;

        if ($request->hasFile('img')) {
            Storage::delete($imagePath);
            $imagePath = Storage::putFile("books", $request->img);
        }

        $book->update([
            'name'  => $request->name,
            'desc'  => $request->desc,
            'img'   => $imagePath,
            'price' => $request->price,
            'cat_id'=> $request->cat_id,
        ]);

        return redirect(url('books/'));
    }
}
