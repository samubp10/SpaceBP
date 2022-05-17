<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href={{ asset('css/outerSpace.css') }} rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>



    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    {{-- <x-jet-banner /> --}}


    <div class="wrapper">
        <div class="wrapper-content">

            {{-- <!-- Page Heading --> --}}
            <x-header />

            <!-- Page Content -->
            <main class="content">
                {{ $slot }}
            </main>

        </div>
    </div>
    @stack('modals')
    @livewireScripts
</body>

</html>
