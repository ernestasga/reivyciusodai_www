<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {!! SEOMeta::generate() !!}

        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        @if (config('app.enable_facebook'))
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0&appId=1755858911398895&autoLogAppEvents=1" nonce="SyROeXdA"></script>
        @endif
         <div class="container">
            @include('inc.navbar')
            @yield('content')
        </div>
    </body>
    <footer>
        @include('inc.footer')
    </footer>

</html>
