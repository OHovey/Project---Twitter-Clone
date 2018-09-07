<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;

class CommentsController extends Controller
{
    public function store(Request $request)
    {

        if ($request->ajax())
        {

            $output = '';

            $username = User::where('id', auth()->user()->id)->first()->name;

            // dd($username);

            $new_comment = Comment::create([
                'user_id' => auth()->user()->id,
                'username' => $username,
                'tweet_id' => $request->tweet_id,
                'body' => $request->comment
            ]);

            $new_comment->save();

            $output .= '<div class="container">';

                $output .= '<h6>' . $new_comment->username . ' | <a href="/users/' . $new_comment->user_id . '"><small>Visit</small></a></h6>';
                $output .= '<p>' . $new_comment->body . '</p>';

            $output .= '</div>';

            return Response($output);

        }
        else 
        {
            return 'nope';
        }

    }
}
