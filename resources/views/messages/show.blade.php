@extends('layouts.master')

@section('content')

<div class="container-fluid message-show-page">

    <div class="container messages-container">
    
        @foreach($messages as $message)

            @if ($message->sender_id == auth()->user()->id)

            <div class="container align-right">
                <small>You at {{ $message->created_at->diffForHumans() }}</small>
                <h6>{{ $message->body }}</h6>
            </div>

            @elseif($message->reciever_id == auth()->user()->id)

                <div class="container align-left">
                    <small>{{ $message->sender_username }} at: {{ $message->created_at->diffForHumans() }}</small>
                    <h6>{{ $message->body }}</h6>
                </div>

            @endif

        @endforeach
    
    </div>

    @include('messages.create_include')

</div>

@endsection