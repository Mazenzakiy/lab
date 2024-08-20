@extends('layout')

@section('title')
Edit
@endsection
<div class="container mt-5">
    @section('mainBody')
        <h1 class="text-center mb-4">Edit Category</h1>
        @include('errors')
        <form action="{{ url("/cats/update/$cat->id") }}" method="POST" enctype="multipart/form-data" class="mx-auto w-50">
            @csrf

            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$cat->name}}" placeholder="Enter your name">
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" class="form-control" cols="30" rows="5" placeholder="Enter description">{{$cat->desc}}</textarea>
            </div>

            <div class="form-group">
                <label for="img">Current Image:</label><br>
                <img src="{{ asset("uploads/$cat->img") }}" height="100px" class="img-fluid mb-3">
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
