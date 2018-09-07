<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;

class UsersController extends Controller
{
    function __construct()
    {

        $this->middleware('auth');

    }

    public function show(User $user)
    {
        $tweets = $user->tweet()->latest()->get();

        return view('users.show', compact(['user', 'tweets']));

    }

    public function follow(User $user)
    {
        // dd($user->id);

        Follower::create([
            'user_id' => auth()->user()->id,
            'followed' => $user->id
        ]);

        return back();

    }
}
