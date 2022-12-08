<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taller vue dropzone</title>
</head>
<body class="antialiased">
<div id="example-div">
</div>
<input hidden id="csrf_token" value="{{@csrf_token()}}">
@routes
<script src="{{ mix('js/home/app.js') }}"></script>
</body>
</html>
