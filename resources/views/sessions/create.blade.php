@extends('layouts.master')

@section('content')

    <div class="container-fluid login-page">

        <form action="/login" method="post">

        {{ csrf_field() }}

            <div class="form-group">

                <label for="email">Email</label>
                <input type="text" name="email" id="email">

            </div>

            <div class="form-group">

                <label for="password">Password: </label>
                <input type="text" name="password" id="password">

            </div>

            <div class="form-group">

                <button class="btn btn-primary">Login</button>

            </div>

            @include('layouts.errors')

        </form>

    </div>

@endsection