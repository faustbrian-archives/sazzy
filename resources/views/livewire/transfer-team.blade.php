<div class="mb-8 bg-white rounded-lg shadow">
    <div class="sm:p-6 md:flex-row flex flex-col items-center justify-between px-4 py-5">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Transfer Team
            </h3>
            <div class="max-w-xl2 mt-2 text-sm leading-5 text-gray-600">
                <p>Transfer this site to another team. You might not be able to edit this site afterwards if you don't have admin permissions on the team.</p>
            </div>
        </div>
        <div class="md:w-auto w-full">
            <div x-data="{ open: false }" @keydown.window.escape="open = false">
                <button @click="open = true" type="button" class="md:mt-0 md:w-auto focus:outline-none sm:text-sm sm:leading-5 focus:border-red-300 focus:shadow-outline-red active:bg-red-200 hover:bg-red-50 inline-flex items-center justify-center w-full px-4 py-2 mt-4 font-medium text-red-700 transition duration-150 ease-in-out bg-red-100 border border-transparent rounded-md">
                    Transfer Team
                </button>

                <div x-show="open" class="sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center fixed inset-x-0 bottom-0 z-40 px-4 pb-6">
                    <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <div @click.away="open = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="sm:max-w-3xl sm:w-full sm:p-6 px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl">
                        <div class="mb-4">
                            <p class="text-xl">Transfer</p>
                            <p class="text-sm text-gray-600">Transfer this team to another user. You might not be able to edit this team afterwards if you don't have administration permissions on the team.</p>
                        </div>

                        <form wire:submit.prevent="transfer">
                            <div class="flex flex-col">
                                <label class="mb-2 font-medium">New owner's e-mail address</label>
                                <input type="email" class="form-input flex-1" wire:model="email">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col mt-4">
                                <label class="mb-2 font-medium">Type <span class="font-bold">{{ $this->team->name }}</span> to confirm</label>
                                <input type="text" class="form-input flex-1" wire:model="name">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:mt-4 sm:flex sm:flex-row-reverse mt-5">
                                <span class="sm:ml-3 sm:w-auto flex w-full rounded-md shadow-sm">
                                    <button type="submit" class="hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red sm:text-sm sm:leading-5 inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md shadow-sm">
                                        Transfer Team
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
        </div>
    </div>
</div>
