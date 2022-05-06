<div class="language-switch">

    @php
       $path = Request::path();
       $path = substr($path,3 );
    @endphp

    <a href="{{ Request::root() }}/en/{{ $path }}" class="selected">
        en
    </a>
    <a href="{{ Request::root() }}/es/{{ $path }}">
        es
    </a>
</div>
