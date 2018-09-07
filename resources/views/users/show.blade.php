@extends('layouts.master')

@section('content')

    <div class="container-fluid user-show-page">
    
        <div class="row">

        <div class="col-sm-3">

            <div class="profile-info">

                <img id="profile-info-img" src="" alt="">

                <div class="container">

                    <h6>Username - <a href="/users/follow/{{ $user->id }}"><button class="btn btn-primary">Follow</button></a></h6>

                    <p><strong>Tweets: </strong></p>

                </div>

            </div>

            <div class="trends">

            </div>

        </div>

        <!-- MAIN CONTAIER FOR TWEETS -->

        <div class="col-sm-6">

            <div class="container-fluid">

                <form style="border-radius: 5px; padding: 10px; background-color: lightblue;" action="/tweet/store" method="post">

                    {{ csrf_field() }}

                    <input placeholder="Whats Happening?" type="text" class="form-control" name="body">

                    <button style="float: right; margin: 20px;" type="submit" class="btn btn-primary">Tweet</button>
                </form>

            </div>

            <div class="container-fluid" style="margin-top: 50px;">

                @foreach ($tweets as $tweet)

                    <div class="container tweet">

                        <h6>{{ $user->name }} <small>- {{ $tweet->created_at->toFormattedDateString() }}</small></h6>

                        <p>{{  $tweet->body }}</p>
                    
                    </div>

                @endforeach

            </div>

        </div>

        <div class="col-md-3">

            <div class="follow-suggestions">

                <h5>Who to follow:</h5>

                <a href=""><small>Refresh</small></a> <a href="/follow/suggestions"><small>View All</small></a>

            </div>

        </div>

    </div>

</div>

    </div>

@endsection