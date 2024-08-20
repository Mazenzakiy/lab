@extends('layout')

@section('title')
Edit
@endsection
<div class="container mt-5">
    @section('mainBody')
        <h1 class="text-center mb-4">Edit Book</h1>
        @include('errors')
        <form action="{{ url("/books/update/$book->id") }}" method="POST" enctype="multipart/form-data" class="mx-auto w-50">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$book->name}}" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" class="form-control" cols="30" rows="5" placeholder="Enter description">{{$book->desc}}</textarea>
            </div>

            <div class="form-group">
                <label for="desc">Price :</label>
                <textarea name="price" id="price" class="form-control" cols="30" rows="5" placeholder="Enter price">{{$book->price}}</textarea>
            </div>

            <div class="form-group">
                <label for="cat_id">Category:</label>
                <select name="cat_id" class="form-control" id="cat_id">
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}" @if ($cat->id==$book->cat_id)
                            @selected(true)
                        @endif>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="img">Current Image:</label><br>
                <img src="{{ asset("uploads/$book->img") }}" height="100px" class="mb-3">
            </div>

            <div class="form-group">
                <label for="img">Upload New Image:</label>
                <input type="file" name="img" class="form-control-file">
            </div>

            <hr>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection
