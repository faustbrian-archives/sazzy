<x-layouts.app>
    <x-slot name="header">
        <h1 class="text-3xl font-bold leading-9 text-white">Team Settings</h1>
        <p class="text-xl leading-9 text-gray-300">Here you can to customize different settings related to your team.</p>
    </x-slot>

    <div class="flex-1 h-full">
        @if($currentUser->ownsCurrentTeam())
            <livewire:update-team-photo />

            <livewire:update-team-name />

            <livewire:manage-team-members />

            <livewire:pending-invitations />

            <livewire:customer-portal />

            <livewire:export-team-data />

            <livewire:transfer-team />

            <livewire:delete-team />
        @else
            <livewire:leave-team />
        @endif
    </div>
</x-layouts.app>
