@extends('layout')

@section('title')
    seacrh category
@endsection

<div class="container mt-5">
    @section('mainBody')
        <h1 class="text-center mb-4">Search Results for "{{ $word }}" in Categories</h1>
        <a href="{{url('/cats')}}" class="btn btn-secondary mb-4">Back to All Categories</a>

        @if ($cats->isEmpty())
            <div class="alert alert-info" role="alert">
                No categories found for "{{ $word }}" in your search.
            </div>
        @else
            @foreach ($cats as $cat)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">
                            {{$cat->id}} - {{$cat->name}}
                        </h2>
                        <p class="card-text">{{$cat->desc}}</p>
                        <small class="text-muted">{{$cat->created_at}}</small>
                    </div>
                </div>
            @endforeach
        @endif
    @endsection
</div>

