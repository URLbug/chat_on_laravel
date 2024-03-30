<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Chat Layout</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        #chat-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        #chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        #chat-title {
            font-size: 24px;
            margin: 0;
        }
        #chat-subtitle {
            font-size: 14px;
            color: #666;
            margin: 0;
        }
        #chat-messages {
            height: 300px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        #chat-input-container {
            display: flex;
            align-items: center;
        }
        #chat-input {
            flex-grow: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }
        #chat-send-btn {
            background-color: #29c5e6;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
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

        <div id="message-2"></div>
    </div>

    <form id="chat-form" method="POST" action="/ " enctype="multipart/form-data">
        <div id="chat-input-container">
            @csrf
            <input type="text" id="chat-input-username" name="username" placeholder="Write a username..." required><br>
            <input type="text" id="chat-input-text" name="text" placeholder="Write a message..." required>
            <button id="submit">Send</button>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script defer>

    $(document).ready(function(){
        window.onload = function()
        {
            document.getElementById('chat-messages').scrollTop = 9999;
        }
        
        setInterval(function(){
            $.get(
                '/all',
                null,
                function(data){
                    console.log(data);

                    $('#chat-messages').html(data);
                }
            );
        }, 4000);

        $('#chat-form').on('submit',function(event){
                event.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    async: true,
                    url: '/',
                    headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                    type: 'POST', 
                    contentType: false,             
                    data: formData,
                    cache : false,
                    processData: false,
                    success:function(response){
                        document.getElementById('message-2').innerHTML = '<div id="message">' + 
                            response.username + ': ' + response.message + '</div>';
                        
                        $('#chat-input-text').val('');
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                alert("some error");
                    },
                });
            });
        })

        

    </script>
</div>



</body>
</html>
