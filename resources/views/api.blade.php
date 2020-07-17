<x-layouts.app>
    <x-slot name="header">
        <h1 class="text-3xl font-bold leading-9 text-white">Create Token</h1>
        <p class="text-xl leading-9 text-gray-300">You can use tokens to authenticate against our api. You'll find more info in our documentation.</p>
    </x-slot>

    <div class="flex-1 h-full">
        <livewire:create-personal-access-token />

        <livewire:manage-personal-access-tokens />
    </div>
</x-layouts.app>
