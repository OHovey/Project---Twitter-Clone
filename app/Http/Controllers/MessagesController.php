<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Session;

class MessagesController extends Controller
{
    
    function __construct()
    {

        return $this->middleware('auth');

    }

    public function index()
    {


        $user_ids = Message::where('sender_id', auth()->user()->id)
                                ->orWhere('reciever_id', auth()->user()->id)
                                ->latest()
                                ->get()
                                ->unique()
                                ->toArray()[0]['reciever_id'];

        $users = User::where('id', $user_ids)->get()->toArray();

        $latest_sent_messages = Message::where('sender_id', auth()->user()->id)
                                            ->latest()
                                            ->select('id', 'body', 'sender_id', 'reciever_id', 'sender_username', 'reciever_username') 
                                            ->get()->unique('sender_id', 'reciever_id');
        
        $latest_recieved_messages = Message::where('reciever_id', auth()->user()->id)
                                            ->latest()
                                            ->select('id', 'body', 'reciever_id', 'sender_id', 'reciever_username', 'sender_username') 
                                            ->get()->unique('reciever_id', 'sender_id');

        $latest_messages = $latest_recieved_messages->merge($latest_sent_messages);

        foreach($latest_messages as $message)
        {

            static $count = 0;

            foreach($latest_messages as $compare)
            {

                if ($message->sender_id == $compare->reciever_id)
                {

                    $latest_messages = $latest_messages->forget($count);

                }  

                $count += 1;

            }

        }

        Session::message_page_session();

        return view('messages.index', compact('users', 'latest_messages'));

    }

    public function show(User $user)
    {

        $messages = Message::where([['sender_id', $user->id],['reciever_id', auth()->user()->id]])
                            ->orWhere([['reciever_id', $user->id],['sender_id', auth()->user()->id]])
                            ->orderBy('created_at', 'desc')
                            ->get();
                            

        // dd($messages);

        $user_id = $user->id;

        return view('messages.show', compact(['messages', 'user_id']));

    }

    public function create(User $user)
    {

        $user = User::find($user->id);

        return view('messages.create', compact('user'));

    }

    public function store(User $user, Request $request)
    {

        if ($request->ajax())
        {

            Message::create([

                'sender_id' => auth()->user()->id,
                'sender_username' => auth()->user()->name,
                'reciever_id' => $user->id,
                'reciever_username' => $user->name,
                'body' => $request->message

            ]);

            return Response();

        }

    }
}
