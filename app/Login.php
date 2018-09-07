<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Auth;

class Login extends Model
{
    public static function check_login()
    {

        if (! Auth::check())
        {

            return True;

        }
        else if (auth()->user()->id == null)
        {

            return True;

        }

    }
}
