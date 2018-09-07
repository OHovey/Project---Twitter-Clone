@extends('layouts.master')

@section('content')

<div class="container registration-form">

    <h4>Create Your Account</h4>

    <form action="/register" method="post">

        {{ csrf_field() }}

        <div class="form-group">

            <label for="username">Username: </label>
            <input type="text" class="form-control" name="name">

        </div>

        <div class="form-group">

            <label for="email">Email: </label>
            <input type="text" class="form-control" name="email">

        </div>

        <div class="form-group">

            <label for="password">Password: </label>
            <input type="text" class="form-control" name="password">

        </div>

        <div class="form-group">

            <label for="password_confirmation">Confirm Passqword: </label>
            <input type="text" class="form-control" name="password_confirmation">

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

        @include('layouts.errors')
    
    </form>

</div>

@endsection