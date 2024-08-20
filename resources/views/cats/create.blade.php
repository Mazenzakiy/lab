@extends('layout')

@section('title')
Create
@endsection

<div class="container mt-5">
    @section('mainBody')
        <h1 class="text-center mb-4">Create Category</h1>
        @include('errors')
        <form action="{{ url('/cats/store') }}" method="POST" enctype="multipart/form-data" class="mx-auto w-50">
            @csrf

            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" class="form-control" cols="30" rows="5" placeholder="Enter description"></textarea>
            </div>

            <div class="form-group">
                <label for="img">Upload Image:</label>
                <input type="file" name="img" class="form-control-file">
            </div>

            <hr>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>

@endsection
