<x-layouts.app>
    <x-slot name="header">
        <h1 class="text-3xl font-bold leading-9 text-white">Subscribe to {{ config('app.name') }}</h1>
        <p class="text-xl leading-9 text-gray-300">Choose the subscription plan that best fits your needs and budget.</p>
    </x-slot>

    <div class="flex-1 h-full">
        <div class="relative z-10">
            <livewire:subscribe />
        </div>
    </div>
</x-layouts.app>
