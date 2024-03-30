@foreach($messages as $message)

    <div id="message">{{ $message->username }}: {{ $message->message }}</div>
    <br>

@endforeach

