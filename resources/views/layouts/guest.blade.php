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
    <div class="row" style="height: 100vh; width: 100vw;">
        <div class="col-md-6 bg-black d-none d-lg-block d-xl-block ">
            @include('partials.quote')
        </div>
        <div class="col-md-6 container">
            <div class="p-3 fs-5">
                <a href="/" class="text-decoration-none"><span class="fs-2">&laquo; </span><span
                        class="text-warning">Back</span></a>
            </div>
            <div class="p-2">
                {{ $slot }}
            </div>

        </div>
    </div>

    </body>
</html>
