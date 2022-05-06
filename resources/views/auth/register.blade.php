<x-guest-layout>

    <x-slot name="logo">
        <x-jet-authentication-card-logo />
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <form class="auth" method="POST" action="{{ route('register') }}">
        @csrf


        <input type="text" class="input1" id="name" type="text" name="name" :value="old('name')" required
            autofocus autocomplete="name" placeholder="{{ __('Name') }}" />

        <input type="text" class="input2" id="email" name="email" value="{{ old('email') }}" required autofocus
            placeholder="{{ __('Email') }}" />

        <input type="password" class="input3" id="password" name="password" required
            autocomplete="{{ __('current-password') }}" placeholder="{{ __('Password') }}" />

        <input type="password" class="input4" id="password_confirmation" name="password_confirmation" required
            placeholder="{{ __('Confirm Password') }}" />

        {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif --}}


        <a class="link3" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <input type="submit" id="send" value=" {{ __('Register') }}">

    </form>

</x-guest-layout>
