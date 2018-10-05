<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;
use \Auth;
use App\Follower;
use App\Login;

class TweetsController extends Controller
{
    
    function __contruct()
    {

        $this->middleware('auth');

    }

    public function index()
    {
        if (! Auth::check())
        {
            return view('landing-page');
        }

        $tweets = Tweet::where('user_id', auth()->user()->id)->latest()->get();

        $following = Follower::where('user_id', auth()->user()->id)->select('followed')->get();

        // dd($tweets);

        $following_tweets = Tweet::whereIn('user_id', $following)
                              ->latest()
                              ->get();

        $auth_retweets = Tweet::where([['retweet', True], ['retweeted_by_id', auth()->user()->id]])->latest()->get();

        $tweets = $tweets->merge($following_tweets);
        $tweets = $tweets->merge($auth_retweets);

        // $tweet = $tweets[0];
        // dd($tweet->user());

        $user = User::find(auth()->user()->id);

        return view('main.index', compact(['tweets', 'user']));

    }

    public function create(Tweet $tweet)
    {

        return view('tweets.create');

    }

    public function store()
    {

        $user_id = auth()->user()->id;

        Tweet::create([
            'body' => request('body'),
            'user_id' => $user_id,
            'retweet' => FALSE
        ]);

        return back();

    }

    public function retweet(Request $request)
    {

        if ($request->ajax())
        {

            $tweet_body = Tweet::where('id', $request->tweet_id)->first()->body;

            Tweet::create([
                'user_id' => $request->tweet_id,
                'body' => $tweet_body,
                'retweet_text' => $request->body,
                'retweet' => 1,
                'retweeted_by_id' => auth()->user()->id,
                'retweeted_by_name' => User::where('id', auth()->user()->id)->first()->name
            ]);

        }
    }
}
