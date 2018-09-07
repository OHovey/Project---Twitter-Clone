<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Session;


class Message extends Model
{
    
    protected $fillable = ['sender_id', 'sender_username', 'reciever_id', 'reciever_username'];


    public static function new_message()
    {
        try {

            $last_message_access_time = Session::where('payload', 'last_message_access_time')->latest()->first();

            if ($last_message_access_time == null)
            {
                return False;
            }

            $last_message_access_time = $last_message_access_time->created_at;

            $latest_message = Message::where('reciever_id', auth()->user()->id)
                                ->latest()
                                ->first()
                                ->select('created_at')
                                ->get()->toArray();

            $latest_message = end($latest_message)['created_at'];
            $latest_message = date_create($latest_message);

            if (date_timestamp_get($last_message_access_time) - date_timestamp_get($latest_message) < 0)
            {

                return TRUE;

            }
            else 
            {

                return FALSE;

            }

        } catch (Exception $e) {

            return FALSE;

        }

        //  $date = $this::first()->select('created_at')->get()->toArray()[0]['created_at'];

        // dd($date);

    }
}
