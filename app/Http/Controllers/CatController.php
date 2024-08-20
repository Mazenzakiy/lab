<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{

    public function index()
    {
        // select * from cats
        $cats = Cat::paginate(2);

        // dd($cats);

        return view('cats/index', [
            'cats' => $cats
        ]);
    }


    public function show($id)
    {
        // select * from cats where id=$id
        $cat = Cat::findOrFail($id);
        return view('cats.show', [
            'cat' => $cat
        ]);
    }


    public function create()
    {


        return view('cats.create');
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'required|image|max:1012|mimes:jpg,jpeg,png',
        ]);


        $imagePath = Storage::putFile('cats', $request->img);

        Cat::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imagePath,
        ]);

        return redirect(url('/cats'));
    }

    public function edit($id)
    {

        $cat = Cat::findOrFail($id);
        // dd($cat);
        return view('cats/edit', [
            'cat' => $cat
        ]);
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'nullable|image|max:1012|mimes:jpg,jpeg,png',

        ]);

        $cat = Cat::findOrFail($id);

        $imagePath = $cat->img;

        if ($request->hasFile('img')) {
            Storage::delete($imagePath);
            $imagePath = Storage::putFile("cats", $request->img);
        }

        $cat->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'img'  => $imagePath,
        ]);

        return redirect(url('cats/'));
    }

    public function delete($id)
    {
        $cat = Cat::findOrFail($id);
        Storage::delete($cat->img);
        $cat->delete();
        return redirect(url('cats/'));
    }

    public function latest($num)
    {
        $cats = Cat::orderBy('id', 'DESC')->take($num)->get();
        //  dd($cats);

        return view('cats.latest', [
            'cats' => $cats,
            'num' => $num,
        ]);
    }


    public function search(Request $request)
    {
        //select from cats where like %word%
        $word = $request->keyword;
        $cats = Cat::where('name', 'like', "%$word%")->get();
        return view('cats.search', [
            'cats' => $cats,
            'word' => $word,
        ]);
    }
}
