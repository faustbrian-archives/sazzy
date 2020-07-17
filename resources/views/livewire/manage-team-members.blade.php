<div class="mb-8">
    <div class="overflow-hidden bg-white rounded-lg shadow">
        <div class="sm:px-6 px-4 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between -mt-2 -ml-4">
                <div class="mt-2 ml-4">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        User Management
                    </h3>
                </div>
                <livewire:invite-team-member />
            </div>
        </div>
        <ul>
            {{-- Accepted --}}
            @foreach($this->members as $member)
                @if($loop->odd)
                    <li>
                @else
                    <li class="border-t border-gray-200">
                @endif
                    <div
                        class="hover:bg-gray-50 focus:outline-none focus:bg-gray-50 block transition duration-150 ease-in-out">
                        <div class="sm:px-6 flex items-center px-4 py-4">
                            <div class="flex items-center flex-1 min-w-0">
                                <div class="flex-shrink-0">
                                    <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-12 h-12 rounded-full">
                                </div>
                                <div class="md:pr-4 md:grid md:grid-cols-2 md:gap-4 flex-1 min-w-0 pl-4">
                                    <div>
                                        <div class="flex items-center justify-between">
                                            <div class="text-sm font-medium leading-5 text-gray-800 truncate">{{ $member->name }}</div>
                                            <span class="md:hidden inline-flex px-2 text-xs font-semibold leading-5 text-teal-800 capitalize bg-teal-100 rounded-full">{{ $member->pivot->role }}</span>
                                        </div>
                                        <div class="mt-2 text-sm leading-5 text-gray-600">
                                            <span class="truncate">{{ $member->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                @if($member->pivot->role === 'owner')
                                    <span class="md:inline-flex hidden px-2 text-xs font-semibold leading-5 text-teal-800 capitalize bg-teal-100 rounded-full">owner</span>
                                @else
                                    <button wire:click="deleteTeamMember({{ $member->id }})" type="button" class="focus:outline-none focus:shadow-outline-red rounded-full">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="hover:text-red-600 focus:outline-none focus:shadow-outline-red w-5 h-5 text-gray-400">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach

            {{-- Accepted --}}
            @foreach($this->invitations as $invitation)
                @if($loop->even)
                    <li>
                @else
                    <li class="border-t border-gray-200">
                @endif
                    <div
                        class="hover:bg-gray-50 focus:outline-none focus:bg-gray-50 block transition duration-150 ease-in-out">
                        <div class="sm:px-6 flex items-center px-4 py-4">
                            <div class="flex items-center flex-1 min-w-0">
                                <div class="flex-shrink-0">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-12 h-12 text-gray-600">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="md:pr-4 md:grid md:grid-cols-2 md:gap-4 flex-1 min-w-0 pl-4">
                                    <div>
                                        <div class="flex items-center justify-between">
                                            <div class="text-sm font-medium leading-5 text-gray-800 truncate">Invited User</div>
                                            <span class="md:hidden inline-flex px-2 text-xs font-semibold leading-5 text-teal-800 capitalize bg-teal-100 rounded-full">{{ $invitation->role }}</span>
                                        </div>
                                        <div class="mt-2 text-sm leading-5 text-gray-600">
                                            <span class="truncate">{{ $invitation->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button wire:click="cancelInvitation({{ $invitation->id }})" type="button" class="focus:outline-none focus:shadow-outline-red rounded-full">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="hover:text-red-600 focus:outline-none focus:shadow-outline-red w-5 h-5 text-gray-400">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
