<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href={{ asset('css/auth.css') }} rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/customsbp.js') }}" defer></script>

</head>

<body>
    <div class="wrapper">
        <x-bgVideo />
        <div class="wrapper-content">

            <header class="header">
                @php
                    $path = Request::path();
                    $path = substr($path, 3);
                    // dd($path);
                @endphp
                <x-spacebpLogo url="{{ Request::root() }}" />

                <x-switchLang path={{$path}} />
                <x-mobileMenu path={{$path}} />

            </header>

            <div class=content>

                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
