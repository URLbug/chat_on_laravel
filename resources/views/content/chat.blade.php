@extends('index')

@section('content')

    <div id="chat-container">
        <div id="chat-header">
            <h2 id="chat-title">Chat</h2>
            <h3 id="chat-subtitle">Active conversation</h3>
        </div>
        <div id="chat-messages">
            @foreach($messages as $message)

                <div id="message">{{ $message->username }}: {{ $message->message }}</div>
                <br>

            @endforeach
        </div>

        <form id="chat-form" method="POST" action="/" enctype="multipart/form-data">
            <div id="chat-input-container">
                @csrf
                <input type="text" class="chat-input" id="username" name="username" placeholder="Write a username..." required><br>
                <input type="text" class="chat-input" id="text" name="text" placeholder="Write a message..." required>
                <button id="submit">Send</button>
            </div>
        </form>
    </div>

@endsection
