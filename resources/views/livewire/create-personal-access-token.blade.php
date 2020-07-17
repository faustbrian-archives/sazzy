<div>
    <div class="mb-8 bg-white rounded-lg shadow">
        <div class="sm:p-6 md:flex-row flex flex-col items-center justify-between px-4 py-5">
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Token Name
                </h3>
                <div class="max-w-xl2 mt-2 text-sm leading-5 text-gray-600">
                    <p>Your token's name will be used for presentation</p>
                </div>
            </div>

            <div class="md:mt-0 md:w-auto w-full mt-4">
                <form wire:submit.prevent="save" class="md:flex-row flex flex-col items-center">
                    <div class="w-full max-w-xs">
                        <label for="name" class="sr-only">Name</label>
                        <div class="relative rounded-md shadow-sm">
                            <input id="name" class="form-input sm:text-sm sm:leading-5 block w-full" wire:model="name" />
                        </div>
                    </div>

                    <span class="sm:mt-0 sm:ml-3 sm:w-auto inline-flex w-full mt-3 rounded-md shadow-sm">
                        <button type="submit" class="hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 sm:w-auto sm:text-sm sm:leading-5 inline-flex items-center justify-center w-full px-4 py-2 font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                            Create
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </div>

    @if($this->accessToken)
        <div x-data="{ open: true }" x-show="open" class="sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center fixed inset-x-0 bottom-0 px-4 pb-6">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="sm:max-w-sm sm:w-full sm:p-6 px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl">
                <div>
                    <div class="flex items-center justify-center w-12 h-12 mx-auto bg-green-100 rounded-full">
                        <svg class="w-6 h-6 text-green-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="sm:mt-5 mt-3 text-center">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Your API Token
                        </h3>

                        <div class="mt-2">
                            <p class="text-sm leading-5 text-gray-500">
                                This is the only time the token will ever be displayed, so be sure not to lose it.
                            </p>

                            <textarea class="focus:outline-none focus:shadow-outline-teal focus:border-teal-300 sm:text-sm sm:leading-5 block w-full px-3 py-2 mt-6 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none" wire:model="accessToken" rows="3" readonly></textarea>
                        </div>
                    </div>
                </div>

                <div class="sm:mt-6 mt-5">
                    <span class="flex w-full rounded-md shadow-sm">
                        <button wire:click="$set('accessToken', null)" type="button" class="hover:bg-teal-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal sm:text-sm sm:leading-5 inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-teal-600 border border-transparent rounded-md shadow-sm">
                            Continue
                        </button>
                    </span>
                </div>
            </div>
        </div>
    @endif
</div>
