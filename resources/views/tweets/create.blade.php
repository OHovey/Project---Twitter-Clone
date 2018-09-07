@extends('layouts.master')

@section('content')

<div class="container">

    <div class="tweet-container-form">

        <form action="/tweet/store" method="post">

        {{ csrf_field() }}
        
            <div class="form-group">
                <label for="body">Body: </label>
                <textarea class="form-control" type="text" name="body" id="body"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Tweet</button>
            </div>

    </form>

    </div>

</div>

@endsection