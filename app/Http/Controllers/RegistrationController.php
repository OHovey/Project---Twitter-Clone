<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Session;

class RegistrationController extends Controller
{

    function __construct()
    {

        $this->middleware('guest');

    }

    public function create()
    {

        return view('register.create');

    }

    public function store()
    {
        if(!$this->validate(request(), ['name' => 'required', 'email' => 'required|email', 'password' => 'required|confirmed']))
        {

            return back()->withErrors([
                'message' => 'please check your details and try again'
            ]);

        }

        $password = User::password_encrypt(request('password'));

        $user = User::create(['name' => request('name'), 'email' => request('email'), 'password' => $password]);

        auth()->login($user);

        Session::notification_session();

        return redirect('/');

    }
}
