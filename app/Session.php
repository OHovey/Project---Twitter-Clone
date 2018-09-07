<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;

class Session extends Model
{
    protected $fillable = ['payload'];

    public static function message_page_session()
    {

        Session::where('payload', 'last_message_access_time')->delete();

        $new_session = Session::create([
            'payload' => 'last_message_access_time'
        ]);

        $new_session->save();

    }

    public static function notification_session()
    {

        Session::where('payload', 'notification')->delete();

        $new_session = Session::create([
            'payload' => 'notification'
        ]);

        $new_session->save();

    }
}
