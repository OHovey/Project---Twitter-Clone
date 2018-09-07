@extends('layouts.master')

@section('content')

<div class="container index-content">

    <div class="row">

        <div class="col-sm-3">

            <div class="profile-info">

                <img id="profile-info-img" src="" alt="">

                <div class="container">

                    <h6>Username: {{ $user->name }}</h6>

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

            <div class="container-fluid " style="margin-top: 50px;">

                @foreach ($tweets as $tweet)

                    @if (! $tweet->retweet)

                        <div class="container tweet">

                            <div style="display: none;" class="container retweet-form{{ $tweet->id }}" id="{{ $tweet->id }}">
                                
                                <div class="form-group">
                                    
                                    <textarea class="form-control" id="retweet_text{{ $tweet->id }}"></textarea>

                                    <button id="{{ $tweet->id }}" type="submit" class="btn btn-primary confirm-retweet">retweet</button>

                                </div>

                            </div>

                            <h6>{{ $tweet->get_tweet_username() }} <small>- {{ $tweet->created_at->toFormattedDateString() }}</small></h6>

                            <p>{{  $tweet->body }}</p>

                            @if($tweet->user_id != auth()->user()->id)

                                <button class="select-retweet" id="{{ $tweet->id }}">retweet</button>

                            @endif

                        </div>

                    @else 

                        @if ($tweet->retweeted_by_id == auth()->user()->id)

                            <div class="container-fluid">

                                <small><a href="/users/{{ $tweet->retweeted_by_id }}"></a> You retweeted this {{ $tweet->created_at->diffForHumans() }}</small>

                                <div class="container tweet">

                                    <h6>{{ $tweet->get_tweet_username() }} <small>- {{ $tweet->created_at->toFormattedDateString() }}</small></h6>

                                    <p>{{  $tweet->body }}</p>

                                    <!-- <a href="/tweets/retweet">retweet</a> -->
                                
                                </div>

                            </div>

                        @else 

                            <div class="container-fluid">

                                <small><a href="/users/{{ $tweet->retweeted_by_id }}">{{ $tweet->retweeted_by_name }}</a> retweeted this {{ $tweet->created_at->diffForHumans() }}</small>

                                <div class="container tweet">

                                    <h6>{{ $tweet->get_tweet_username() }} <small>- {{ $tweet->created_at->toFormattedDateString() }}</small></h6>

                                    <p>{{  $tweet->body }}</p>

                                    <!-- <a href="/tweets/retweet">retweet</a> -->
                                
                                </div>

                            </div>

                        @endif

                    @endif

                    @include('layouts.comment')

                    @foreach($tweet->comments() as $comment)
                    
                        <div class="container-fluid comment-container-div">

                            <ul>
                            
                                <li>

                                    <h6>{{ $comment->username }}</h6>
                                    
                                    <small>{{ $comment->body }}</small>

                                </li>

                            </ul>

                        </div>

                        @unset($comment)
                    
                    @endforeach

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

@endsection