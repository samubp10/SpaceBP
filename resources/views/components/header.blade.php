<header class="header">

    <x-spacebpLogo url="{{ Request::root() }}/{{ app()->getLocale() }}/outerSpace" />

    <x-nav-bar />

    <x-switchLang />
    {{-- @livewire('navigation-menu') --}}
    @if (Auth::check())
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="wrapper-profile">

                <div class="dropdown">
                    <a href="{{ Request::root() }}/{{ app()->getLocale() }}/outerSpace"><img id="profile"
                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /></a>

                    <div class="dropdown-content">
                        <a class="dropdown-item-1" href="{{ route('profile.show', app()->getLocale()) }}">
                            {{ __('Profile') }}
                        </a>

                        <a class="dropdown-item-2" href="#">
                            {{ __('News saved') }}
                        </a>

                        <a class="dropdown-item-3" href="#">
                            {{ __('Pictures saved') }}
                        </a>

                        <form class="dropdown-item-4" method="POST" action="{{ route('logout', app()->getLocale()) }}"
                            x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout', app()->getLocale()) }}"
                                @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </div>
                </div>
            @else
                <span id="profile">
                    <button type="button">
                        {{ Auth::user()->name }}
                    </button>
                </span>
            </div>
        @endif
    @else
        <x-signButtons />
    @endif
</header>
