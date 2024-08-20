@extends('layout')

@section('title')
    All books
@endsection

@section('mainBody')

{{-- <form action="{{url('/books/search')}}" method="get">
    <input type="search" name="keyword" >
    <input type="submit" value="search">
</form> --}}

<br>
<hr>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>All Books</h1>
    <a href="{{url('books/create')}}" class="btn btn-success">Add New Book</a>
</div>

@foreach ($books as $book)
    <div class="card mb-4">
        <div class="card-body">
            <h3>
                <a href="{{ url( 'books/show', $book->id ) }}">
                    {{$book->id}} - {{$book->name}}
                </a>
            </h3>
            <p>{{$book->desc}}</p>
            <img src="{{ asset("uploads/$book->img") }}" height="100px" class="mb-3" alt="Book Image">
            <h3>Price: {{$book->price}} $</h3>
            <div class="d-flex justify-content-between">
                <a href="{{ url( 'books/edit', $book->id ) }}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ url( 'books/delete', $book->id ) }}" class="btn btn-danger btn-sm">Delete</a>
            </div>
        </div>
    </div>
@endforeach

<div class="d-flex justify-content-center">
    {{$books->links('pagination::bootstrap-4')}}
</div>

@endsection
