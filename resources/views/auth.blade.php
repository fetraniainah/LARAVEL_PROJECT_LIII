<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ZRT</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
        <!-- Styles -->
    </head>
    <body style="background-image: url({{asset('image/bg2.gif')}}) ">
        @yield('auth')
        <script src="{{asset('assets/js/auth.js')}}"></script>
    </body>
</html>
