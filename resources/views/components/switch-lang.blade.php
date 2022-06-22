<div class="language-switch">

    
    @if ($path != 1)
        <a href="{{ Request::root() }}/en/{{ $path }}" class="selected">
            en
        </a>
        <a href="{{ Request::root() }}/es/{{ $path }}">
            es
        </a>
    @else
        <a href="{{ Request::root() }}/en/" class="selected">
            en
        </a>
        <a href="{{ Request::root() }}/es/">
            es
        </a>
    @endif
</div>
