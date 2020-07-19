<x-layouts.app>
    <x-slot name="header">
        <h1 class="text-3xl font-bold leading-9 text-white">Security & Privacy</h1>
        <p class="text-xl leading-9 text-gray-300">Here you can to customize different settings related to your account.</p>
    </x-slot>

    <div class="flex-1 h-full">
        <livewire:update-user-password />

        @if($currentUser->uses_two_factor_auth)
            <livewire:disable-two-factor-auth />
        @else
            <livewire:enable-two-factor-auth />
        @endif

        <livewire:export-user-data />
    </div>
</x-layouts.app>
