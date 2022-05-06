<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="A web page where you can learn and know about the latest news about the outer space.">
    <title>SpaceBP</title>
    <link href={{ asset('css/landingPage.css') }} rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <x-bgVideo />
        <div class="wrapper-content">
            <header class="header">

                <x-spacebpLogo />

                <x-switchLang />

                <x-signButtons />
            </header>

            <section id="content">
                <div class="content-name">
                    <h1>{{ __('TRAVEL TO OUTER SPACE WITH SPACEBP') }}</h1>
                </div>
                <div class="content-description">
                    <p>{{ __('SpaceBP is a web page where you can learn, share knowledge, know about the latest news, and many other things about the space.') }}
                    </p>
                </div>
                <div class="content-explore">
                    <a href="#" id="explore">{{ __('Explore') }}</a>
                </div>
            </section>
        </div>
    </div>
</body>


</html>
