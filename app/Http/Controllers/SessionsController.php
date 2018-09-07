<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class sessionsController extends Controller
{

    function __construct()
    {

        $this->middleware('guest')->except('destroy');

    }

    public function index()
    {

        return view('landing-page');

    }
    
    public function create()
    {

        return view('sessions.create');

    }

    public function store()
    {

        $password = bcrypt('password');

        if (! auth()->attempt(['name' => request('username'), 'password' => $password]))
        {
            return back()->withErrors([
                'message' => 'please check your credientials and try again'
            ]);
        }

        return redirect('/');

    }

    public function destroy()
    {

        auth()->logout();

        return redirect('/');

    }
}
