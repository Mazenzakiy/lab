@extends('layout')

@section('title')
    Registration
@endsection

@section('mainBody')
<div class="container mt-5">
    <h1 class="text-center mb-4">Register</h1>

    @include('errors')  <!-- Include error messages -->

    <form action="{{ url('/register') }}" method="POST" class="mx-auto w-50">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm your password" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</div>
@endsection
