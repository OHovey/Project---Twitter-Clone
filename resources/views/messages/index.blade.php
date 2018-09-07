@extends('layouts.master')

@section('content')

<div class="container-fluid messages-index-page">

    <div class="container">
    
        <ul class="latest-messages-list">
        
        

            @foreach($latest_messages as $message)

            @if(App\User::find(auth()->user()->id)->hasMessage($message['id']))

            <a href="/messages/show/{{ $message['reciever_id'] }}">

                <li>
                
                    <div class="card">

                        <div class="row">

                            <div class="col-sm-2">
                            
                                <h5>{{ $message['reciever_username'] }}</h5>
                            
                            </div>

                            <div class="col-sm-10">
                            
                                <p>{{ $message['body'] }}</p>
                            
                            </div>
                        
                        </div>

                    </div>
                
                </li>
            
            </a>

            @elseif(App\User::find( $message['sender_id'] )->hasMessage($message['id']) )


            <a href="/messages/show/{{ $message['sender_id'] }}">

                <li>
                
                    <div class="card">

                        <div class="row">

                            <div class="col-sm-2">
                            
                                <h5>{{ $message['sender_username'] }}</h5>
                            
                            </div>

                            <div class="col-sm-10">
                            
                                <p>{{ $message['body'] }}</p>
                            
                            </div>
                        
                        </div>

                    </div>
                
                </li>

            @endif

            @endforeach

        

        </ul>
    
    </div>

</div>

@endsection