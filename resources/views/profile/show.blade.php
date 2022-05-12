<x-app-layout>

    <x-slot name="header">
        <h2>
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="P-Update">
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')
        @endif
    </div>
    <div class="P-UpdatePass">
        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @livewire('profile.update-password-form')
        @endif
    </div>
    <div class="P-TwoFactAuth">
        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            @livewire('profile.two-factor-authentication-form')
        @endif
    </div>
    <div class="P-BrowserSessions">
        @livewire('profile.logout-other-browser-sessions-form')
    </div>
    <div class="P-AccDeletion">
        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            @livewire('profile.delete-user-form')
        @endif
    </div>
</x-app-layout>
