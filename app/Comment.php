<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['user_id', 'username', 'tweet_id', 'body'];

    public function tweet()
    {

        return $this->belongsTo(Tweet::class);

    }
}
