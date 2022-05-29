<x-app-layout>
    <div class="welcome">
        <h1 id="wel-title">{{ __('Welcome to SPACEBP!') }}</h1>
        <article id="wel-gallery">
            <h2>{{ __('Gallery') }}</h2>
            <x-gallerySVG />
            <p>{{ __('In the gallery you will be amazed by the almost infinite number of images ranging from a few kilometers to thousands of light years away.') }}
            </p>
        </article>
        <article id="wel-news">
            <h2>{{ __('News') }}</h2>
            <x-newsSVG />
            <p>{{ __('In the news section you will be able to learn about the most important current news related to the world of Astrology.') }}

        </article>
        <article id="wel-solarSys">
            <h2>{{ __('Solar System') }}</h2>
            <x-solarSystemSVG />
            <p>{{ __('Sometimes we do not know so well the part of the universe that is closer to us, in this section you can learn about the planets of our solar system as well as details about them.') }}

        </article>
        <article id="wel-posts">
            <h2>{{ __('Posts') }}</h2>
            <x-postsSVG />
            <p>{{ __('Do you want to share an idea with the world? Do you have knowledge that you think the world needs to know? In this section you will be able to write a post related to the world of science.') }}

        </article>
    </div>

</x-app-layout>
