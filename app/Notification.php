<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Session;

class Notification extends Model
{
    public static function new_notifications()
    {

            $last_check = Session::where('payload', 'notification')->first();

            if ($last_check == null)
            {
                return [];
            }

            $last_check = $last_check->created_at;
            
            $following = Follower::where('user_id', auth()->user()->id)->latest()->get()->toArray();
            $user_ids = [];
            foreach($following as $f)
            {
                array_push($user_ids, $f['followed']);
            }

            $users = User::where('id', $user_ids)->get();

            // dd($users);

            $tweets_collection = collect([]);

            foreach($users as $user)
            {
                $tweets_collection = $tweets_collection->merge($user->get_tweets());
            }

            return $tweets_collection;

    }
}
