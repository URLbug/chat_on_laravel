<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Chat Layout</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

@yield('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="{{ asset('js/script.js') }}" defer></script>

</body>
</html>
