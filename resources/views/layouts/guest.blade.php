<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href={{ asset('css/auth.css') }} rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <div class="wrapper">
        <x-bgVideo />
        <div class="wrapper-content">

            <header class="header">
                <x-spacebpLogo url="{{ Request::root() }}"/>

                <x-switchLang />
            </header>

            <div class=content>

                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
