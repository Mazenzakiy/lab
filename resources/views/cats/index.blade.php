@extends('layout')

@section('title')
    All categories
@endsection

<div class="container mt-5">
    @section('mainBody')

    <form action="{{url('/cats/search')}}" method="get" class="form-inline mb-4">
        <input type="search" name="keyword" class="form-control mr-2" placeholder="Search categories">
        <input type="submit" value="Search" class="btn btn-primary">
    </form>

    <hr>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>All Categories</h1>
        <a href="{{url('cats/create')}}" class="btn btn-success">Add New Category</a>
    </div>

    @foreach ($cats as $cat)
        <div class="card mb-4">
            <div class="card-body">
                <h3>
                    <a href="{{ url('cats/show', $cat->id) }}">
                        {{$cat->id}} - {{$cat->name}}
                    </a>
                </h3>
                <p>{{$cat->desc}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ url('cats/edit', $cat->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                        <a href="{{ url('cats/delete', $cat->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    <img src="{{ asset("uploads/$cat->img") }}" height="100px" >
                </div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {{$cats->links('pagination::bootstrap-4')}}
    </div>

    @endsection
</div>

