@extends('layouts.master')

@section('content')

<div class="container-fluid landing-page">

    <div class="row">

        <!-- left hand side column -->

        <div class="col-sm-6 landing-page-list">
            <div class="container">

                <ul class="list-group landing-page-list">

                    <li class="list-item">
                        <h4>Follow Your interests</h4>
                    </li>

                    <li class="list-item">
                        <h4>Hear what people are talking about</h4>
                    </li>

                    <li class="list-item">
                        <h4>Join the conversation</h4>
                    </li>

                </ul>

            </div>
        </div>

        <!-- right hand side coloumn -->

        <div class="col-sm-6">
            <div class="container">
                
                <div class="row">

                    <!-- <div class="col-xs-6">
                        <button style="float: right;" href="/login" class="btn btn-primary float-right">
                            Log in
                        </button>
                    </div> -->

                    <div class="col-xs-6">
                        <h1></h1>
                    </div>

                </div>

                <h3>See Whats happening in the world right now</h3>

                <h6>Join Twitter Today</h6>

                <button type="submit" class="btn btn-primary form-control but-sep"><a href="/register/create">Sign Up</a></button>
                <button type="submit" class="btn btn-primary form-control but-sep"><a href="/login/create">Log In</a></button>

            </div>
        </div>

    </div>

</div>

@endsection
