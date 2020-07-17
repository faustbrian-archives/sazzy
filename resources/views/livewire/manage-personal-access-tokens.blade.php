<div>
    @if($this->tokens->count())
        <div class="overflow-hidden bg-white rounded-lg shadow">
            <div class="sm:px-6 px-4 py-5 border-b border-gray-200">
                <div class="flex items-center justify-between -mt-2 -ml-4">
                    <div class="mt-2 ml-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Personal Access Tokens
                        </h3>
                    </div>
                </div>
            </div>
            <ul>
                @foreach($this->tokens as $token)
                    @if($loop->odd)
                        <li>
                    @else
                        <li class="border-t border-gray-200">
                    @endif
                        <div
                            class="hover:bg-gray-50 focus:outline-none focus:bg-gray-50 block transition duration-150 ease-in-out">
                            <div class="sm:px-6 flex items-center px-4 py-4">
                                <div class="flex items-center flex-1 min-w-0">
                                    <div class="md:pr-4 md:grid md:grid-cols-2 md:gap-4 flex-1 min-w-0">
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <div class="text-sm font-medium leading-5 text-gray-800 truncate">{{ $token->name }}</div>
                                            </div>
                                            <div class="mt-2 text-sm leading-5 text-gray-600">
                                                <span class="truncate">
                                                    {{ $token->last_used_at ? $token->last_used_at->toDayDateTimeString() : 'Never used' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button wire:click="deleteToken({{ $token->id }})" type="button" class="focus:outline-none focus:shadow-outline-red rounded-full">
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
    @endif
</div>
