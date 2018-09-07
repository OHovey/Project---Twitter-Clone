<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use \DB;

class Tweet extends Model
{

    protected $fillable = ['body', 'retweet_text', 'user_id', 'retweet', 'retweeted_by_id', 'retweeted_by_name'];
    
    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function comment()
    {

        return $this->hasMany(Comment::class);

    }

    public function comments()
    {

        return Comment::where('tweet_id', $this->id)->latest()->get();

    }

    public function get_tweet_username()
    {

        $tweet_user_id = Tweet::where('body', $this->body)->select('user_id')->first()->attributes['user_id'];

        return User::where('id', $tweet_user_id)->first()->name;

    }

    public static function retweet($request, $tweet_body)
    {

        Tweet::create([
            'user_id' => $request->tweet_id,
            'body' => $tweet_body,
            'retweet_text' => $request->body,
            'retweet' => True,
            'retweeted_by_id' => auth()->user()->id,
            'retweeted_by_name' => auth()->user()->name
        ]);

    }

}
