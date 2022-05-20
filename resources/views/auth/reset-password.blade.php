<x-guest-layout>
    

    <form method="POST" class="auth" action="{{ route('password.update', app()->getLocale()) }}">
        @csrf

        <x-jet-validation-errors />

        <input type="hidden" name="token" value="{{ $request->route('token') }}">


        {{-- <x-jet-label for="email" value="{{ __('Email') }}" /> --}}
        {{-- <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request - > email)"
            required autofocus place /> --}}
        <input class="input1" type="email" id="email" name="email" value="{{ old('email',$request->email) }}" required
            autofocus placeholder="{{ __('Email') }}" />

        <input class="input2" type="password" id="password" name="password" required
            autocomplete="{{ __('current-password') }}" placeholder="{{ __('Password') }}" />

        {{-- <x-jet-label for="password" value="{{ __('Password') }}" />
        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="new-password" /> --}}



        {{-- <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
            required autocomplete="new-password" /> --}}

        <input type="password" class="input3" id="password_confirmation" name="password_confirmation" required
            placeholder="{{ __('Confirm Password') }}" />



        {{-- <x-jet-button>
            {{ __('Reset Password') }}
        </x-jet-button> --}}

        <input type="submit" id="send3" value=" {{ __('Reset Password') }}">


    </form>

</x-guest-layout>
