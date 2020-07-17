<div x-data="{ open: false }" @keydown.window.escape="open = false">
    <div class="mb-8 overflow-hidden bg-white rounded-lg shadow">
        <div class="sm:p-6 md:flex-row flex flex-col items-center justify-between px-4 py-5">
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Change Password
                </h3>
                <div class="max-w-xl2 mt-2 text-sm leading-5 text-gray-600">
                    <p><p>Change your {{ config('app.name') }} password. We'll email you to ensure you're the one who's actually doing this.</p></p>
                </div>
            </div>

            <div class="md:w-auto w-full">
                <span class="inline-flex w-full rounded-md shadow-sm">
                    <button @click="open = true" type="button" class="hover:text-gray-800 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800 relative w-full px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in bg-white border border-gray-300 rounded-md">
                        Change Password
                    </button>
                </span>
            </div>
        </div>
    </div>

    <div x-show="open" class="sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center fixed inset-x-0 bottom-0 z-40 px-4 pb-6">
        <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div @click.away="open = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="sm:max-w-3xl sm:w-full sm:p-6 px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl">
            <div class="sm:block absolute top-0 right-0 hidden pt-4 pr-4">
                <button @click="open = false" type="button" aria-label="Close" class="hover:text-gray-500 focus:outline-none focus:text-gray-500 text-gray-400 transition duration-150 ease-in-out">
                    <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="mb-4">
                <p class="text-xl">Change your password</p>
                <p class="text-sm text-gray-600">Change your {{ config('app.name') }} password. We'll email you to ensure you're the one who's actually doing this.</p>
            </div>

            <form wire:submit.prevent="save">
                <div class="flex flex-col">
                    <label for="current_password" class="mb-2 font-medium">Current Password</label>
                    <input id="current_password" type="password" class="form-input flex-1" wire:model="current_password" />
                    @error('current_password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mt-4">
                    <label for="password" class="mb-2 font-medium">New Password</label>
                    <input id="password" type="password" class="form-input flex-1" wire:model="password" />
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mt-4">
                    <label for="password_confirmation" class="mb-2 font-medium">Repeat Password</label>
                    <input id="password_confirmation" type="password" class="form-input flex-1" wire:model="password_confirmation" />
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:mt-4 sm:flex sm:flex-row-reverse mt-5">
                    <span class="sm:ml-3 sm:w-auto flex w-full rounded-md shadow-sm">
                        <button type="submit" class="hover:bg-teal-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal sm:text-sm sm:leading-5 inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-teal-600 border border-transparent rounded-md shadow-sm">
                            Change Password
                        </button>
                    </span>

                    <span class="sm:mt-0 sm:w-auto flex w-full mt-3 rounded-md shadow-sm">
                        <button @click="open = false" type="button" class="hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5 inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
