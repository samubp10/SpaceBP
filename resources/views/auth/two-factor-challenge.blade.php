<x-guest-layout>

    <div class="content" x-data="{ recovery: false }">

        <form method="POST" class="auth" action="{{ route('two-factor.login', app()->getLocale()) }}">
            @csrf

            <x-jet-validation-errors />

            <div class="text" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            <div class="text" x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>


            <div class="input6" style="" x-show="! recovery">
               
                <input class="input7" id="code" type="text" inputmode="numeric" name="code" autofocus
                    x-ref="code" autocomplete="one-time-code" placeholder="{{ __('Code') }}" />
            </div>

            <div  class="input6" x-show="recovery">
                
                <input class="input7" id="recovery_code" type="text" name="recovery_code"
                    x-ref="recovery_code" autocomplete="one-time-code" placeholder="{{ __('Recovery Code') }}" />
            </div>


            <button type="button" id="send4"  x-show="! recovery" x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                {{ __('Use a recovery code') }}
            </button>

            <button type="button"  id="send4" x-show="recovery" x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                {{ __('Use an authentication code') }}
            </button>

            
            <button id="send5">
                {{ __('Log in') }}
            </button>

        </form>
    </div>

</x-guest-layout>
