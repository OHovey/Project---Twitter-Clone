<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Tweet;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    

    public function hasMessage($message_id)
    {

        if (! (Message::where('id', $message_id)->select('sender_id')->get()->toArray()[0]['sender_id'] == $this->id))
        {
            return false;
        }

        return true;

    }

    public function tweet()
    {

        return $this->hasMany(Tweet::class);

    }

    public function get_tweets()
    {

        return Tweet::where('user_id', $this->id)->get();

    }

    public function follower()
    {

        return $this->hasMany(Follower::class);

    }

    public function password_encrypt($password)
    {

        return bcrypt($password);

    }
}
