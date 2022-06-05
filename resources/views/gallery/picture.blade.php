<x-app-layout>
    {{-- @dump($picture); --}}
    <div class="picture">
        <img id="picture-image" src="{{ $picture->url }}" alt="{{ $picture->title }}">

        <div class="picture-information">
            <h1 id="picture-title">{{ $picture->title }}</h1>
            <p id="picture-explanation"> {{ $picture->explanation }}</p>
            <footer>
                @if (property_exists($picture, 'copyright'))
                    <p id="picture-author">Author: {{ $picture->copyright }}</p>
                @endif
                <p id="picture-date">{{ $picture->date }}</p>
            </footer>
        </div>
    </div>
</x-app-layout>
