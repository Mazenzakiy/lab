@extends('layout')

@section('title')
    Create
@endsection

<div class="container mt-5">
    @section('mainBody')
        <h1 class="text-center mb-4">Create Page</h1>
        @include('errors')
        <form action="{{ url('/books/store') }}" method="POST" enctype="multipart/form-data" class="mx-auto w-50">
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
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" placeholder="Enter price">
            </div>

            <div class="form-group">
                <label for="img">Upload Image:</label>
                <input type="file" name="img" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="cat_id">Category:</label>
                <select name="cat_id" class="form-control" id="cat_id">
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <hr>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>

@endsection
