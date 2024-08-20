@extends('layout')

@section('title')
book
@endsection

@section('mainBody')
<h1 class="mb-4">Book - {{$book->name}}</h1>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Created At</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->name}}</td>
            <td>{{$book->desc}}</td>
            <td>{{$book->price}} $</td>
            <td><a href="{{url("/cats/show/".$book->cat->id)}}">{{$book->cat->name}}</a></td>
            <td>{{$book->created_at}}</td>
            <td><img src="{{ asset("uploads/$book->img") }}" height="100px"></td>
            <td><a href="{{ url('books/edit', $book->id ) }}" class="btn btn-primary btn-sm">Edit</a></td>
        </tr>
    </tbody>
</table>

<a href="{{url('/books')}}" class="btn btn-secondary mt-3">Back</a>


@endsection
