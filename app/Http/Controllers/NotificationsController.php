<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Follower;
use App\User;
use \Collection;
use App\Notification;

class NotificationsController extends Controller
{

    function __construct()
    {

        $this->middleware('auth');

    }

    public function notifications(Request $request)
    {
        

        try {

            $tweets_collection = Notification::new_notifications();

            if ($tweets_collection == null)
            {

                $data = "<p>You're all caught up!</p>";

                return Response($data);

            }

        } catch (Exception $e) {
            
        }

        $data = '';

        foreach($tweets_collection as $tweet)
        {
            $data .= '<a class="dropdown-item" href="/tweets/{{ ' . $tweet->id . ' }}">' . $tweet->get_tweet_username() . ' posted a tweet at<br>' . $tweet->created_at . '</a>';
        }

        // Session::notification_session();

        return Response($data);

        // return view('notifications.index');

    }

    public function index()
    {
        $tweets_collection = Notification::new_notifications();

        $user = User::find(auth()->user()->id)->first();

        Session::notification_session();

        return view('notifications.index', compact(['tweets_collection', 'user']));

    }
}
