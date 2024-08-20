@extends('layout')

@section('title')
categeroy
@endsection

@section('mainBody')
<h1 class="mb-4">Category - {{$cat->name}}</h1>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->desc}}</td>
            <td>{{$cat->created_at}}</td>
            <td><a href="{{ url('cats/edit', $cat->id ) }}" class="btn btn-primary btn-sm">Edit</a></td>
        </tr>
    </tbody>
</table>

<h4 class="mt-4">Books:</h4>
<ul class="list-group">
    @foreach ($cat->books as $book)
        <li class="list-group-item"><a href="{{url("/books/show/".$book->id)}}">{{$book->name}}</a></li>
    @endforeach
</ul>


<a href="{{url('/cats')}}">Back</a>

@endsection
