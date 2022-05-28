<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @include('partials.bootstrap')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
    <div class="row bg-black" style="height: 100vh; width: 100vw;">
        <div class="col-auto container" style="margin-top: 100px;">
            <img src="{{ url('/assets/logo.svg')}}" style="width: 5rem; margin-left: auto; margin-right: auto;"/>
            <div class="p-2">
                {{ $slot }}
            </div>
            <div class="p-3 fs-5">
                <x-back-link/>
            </div>
        </div>
    </div>

    </body>
</html>
