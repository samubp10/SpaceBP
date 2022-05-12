<x-guest-layout>

    <form method="POST" class="auth" action="{{ route('password.email', app()->getlocale()) }}">
        @csrf
        <x-jet-validation-errors />
        <p class="text">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </p>

        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif
        <input class="input5" type="text" id="email" name="email" value="{{ old('email') }}" required autofocus
            placeholder="{{ __('Email') }}" />

        <input type="submit" id="send2" value="{{ __('Email Password Reset Link') }}">
    </form>

</x-guest-layout>
