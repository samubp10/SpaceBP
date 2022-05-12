<x-guest-layout>

    
    {{ session('status') }}

    @if (session('status'))
        {{ session('status') }}
    @endif

    <form class="auth" method="POST" action="{{ route('login', app()->getLocale()) }}">
        @csrf

        <x-jet-validation-errors />

        <input class="input1" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
            placeholder="{{ __('Email') }}" />

        <input class="input2" type="password" id="password" name="password" required
            autocomplete="{{ __('current-password') }}" placeholder="{{ __('Password') }}" />


        @if (Route::has('password.request'))
            <a class="link2" id="req_password" href="{{ route('password.request', app()->getLocale(), ['locale' =>  app()->getLocale()]) }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <div class="link1">

            <span id="text_remember">{{ __('Remember me') }}</span>
            <input class="checkStyled" id="remember" type="checkbox" name="remember" />
            <label for="remember"></label>

        </div>

        <input type="submit" id="send3" value="{{ __('Log in') }}">

    </form>

</x-guest-layout>
