<div>
    @if($this->invitations->count())
        <div class="mb-8">
            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="sm:px-6 px-4 py-5 border-b border-gray-200">
                    <div class="flex items-center justify-between -mt-2 -ml-4">
                        <div class="mt-2 ml-4">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                Pending Invitations
                            </h3>
                        </div>
                    </div>
                </div>
                <ul>
                    @foreach($this->invitations as $invitation)
                        @if($loop->even)
                            <li class="border-t border-gray-200">
                        @else
                            <li>
                        @endif
                            <div
                                class="hover:bg-gray-50 focus:outline-none focus:bg-gray-50 block transition duration-150 ease-in-out">
                                <div class="sm:px-6 flex items-center px-4 py-4">
                                    <div class="flex items-center flex-1 min-w-0">
                                        <div class="flex-shrink-0">
                                            <img src="{{ $invitation->team->photo }}" alt="{{ $invitation->team->name }}" class="w-12 h-12 rounded-full">
                                        </div>
                                        <div class="md:pr-4 md:grid md:grid-cols-2 md:gap-4 flex-1 min-w-0 pl-4">
                                            <div>
                                                <div class="flex items-center justify-between">
                                                    <div class="text-sm font-medium leading-5 text-gray-800 truncate">{{ $invitation->team->name }}</div>
                                                </div>
                                                <div class="mt-2 text-sm leading-5 text-gray-600">
                                                    <span class="truncate">{{ ucfirst($invitation->role) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button wire:click="acceptInvitation({{ $invitation->id }})" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-green-700 bg-green-100 hover:bg-green-50 focus:outline-none focus:border-green-300 focus:shadow-outline-green active:bg-green-200 transition ease-in-out duration-150">
                                            Accept
                                        </button>

                                        <button wire:click="rejectInvitation({{ $invitation->id }})" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-red-700 bg-red-100 hover:bg-red-50 focus:outline-none focus:border-red-300 focus:shadow-outline-red active:bg-red-200 transition ease-in-out duration-150">
                                            Reject
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
