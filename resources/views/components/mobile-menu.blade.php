<div class="mobile-menu" id="mobMenu">
    {{-- @dump( $path ) --}}
    {{-- onclick="this.classList.toggle('open')"> --}}
    <a href="{{ route('gallery.', app()->getLocale()) }}" class="option"></a>
    <a href="{{ route('news.', app()->getLocale()) }}" class="option"></a>

    @if ($path != 1)

        @if (app()->getLocale() == 'es')
            <a href="{{ Request::root() }}/en/{{ $path }}" class="option" id="en"></a>
        @else
            <a href="{{ Request::root() }}/es/{{ $path }}" class=" option" id="es"></a>
        @endif
    @else
        @if (app()->getLocale() == 'es')
            <a href="{{ Request::root() }}/en/" class="option" id="en"></a>
        @else
            <a href="{{ Request::root() }}/es/" class=" option" id="es"></a>
        @endif
    @endif


    <a href="https://paulohscwb.github.io/solar-system/vr/solar.html" class="option" target="blank"></a>

</div>
