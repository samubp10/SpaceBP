<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->


    </div>

    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <!-- Settings Dropdown -->
        <div>
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button>
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span>
                            <button type="button">
                                {{ Auth::user()->name }}
                            </button>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->


                    <x-jet-dropdown-link href="{{ route('profile.show', app()->getLocale()) }}">
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index', app()->getLocale()) }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                    @endif



                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout', app()->getLocale()) }}" x-data>
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout', app()->getLocale()) }}"
                            @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </x-slot>
            </x-jet-dropdown>




            <!-- Responsive Settings Options -->

            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
            @endif


            <div>{{ Auth::user()->name }}</div>
            <div>{{ Auth::user()->email }}</div>



            <!-- Account Management -->
            <x-jet-responsive-nav-link href="{{ route('profile.show', app()->getLocale()) }}" :active="request()->routeIs('profile.show')">
                {{ __('Profile') }}
            </x-jet-responsive-nav-link>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-responsive-nav-link href="{{ route('api-tokens.index', app()->getLocale()) }}"
                    :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-jet-responsive-nav-link>
            @endif

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout', app()->getLocale()) }}" x-data>
                @csrf

                <x-jet-responsive-nav-link href="{{ route('logout', app()->getLocale()) }}"
                    @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </x-jet-responsive-nav-link>
            </form>



</nav>
