<x-layouts.app>
    <x-slot name="header">
        <h1 class="text-3xl font-bold leading-9 text-white">Settings</h1>
        <p class="text-xl leading-9 text-gray-300">Here you can to customize different settings related to your account.</p>
    </x-slot>

    <div class="flex-1 h-full">
        <livewire:update-user-photo />

        <livewire:update-user-name />

        <livewire:update-user-mail />

        <livewire:delete-account />
    </div>
</x-layouts.app>
