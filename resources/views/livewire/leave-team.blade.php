<div class="mb-8 bg-white rounded-lg shadow">
    <div class="sm:p-6 md:flex-row flex flex-col items-center justify-between px-4 py-5">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Leave Team
            </h3>
            <div class="max-w-xl2 mt-2 text-sm leading-5 text-gray-600">
                <p>This will revoke your access to the team and all projects owned by it.</p>
            </div>
        </div>
        <div x-data="{ open: false }" @keydown.window.escape="open = false" class="md:w-auto w-full">
            <button @click="open = true" type="button" class="md:mt-0 md:w-auto focus:outline-none sm:text-sm sm:leading-5 focus:border-red-300 focus:shadow-outline-red active:bg-red-200 hover:bg-red-50 inline-flex items-center justify-center w-full px-4 py-2 mt-4 font-medium text-red-700 transition duration-150 ease-in-out bg-red-100 border border-transparent rounded-md">
                <span>Leave Team</span>
            </button>

            <div x-show="open" class="sm:inset-0 sm:flex sm:items-center sm:justify-center fixed inset-x-0 bottom-0 z-50 px-4 pb-4">
                <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div @click.away="open = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="sm:max-w-lg sm:w-full sm:p-6 px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl">
                    <div class="sm:flex sm:items-start">
                        <div class="sm:mx-0 sm:h-10 sm:w-10 flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full">
                            <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" class="w-6 h-6 text-red-600">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <div class="sm:mt-0 sm:ml-4 sm:text-left mt-3 text-center">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Leave Team</h3>
                            <div class="mt-2">
                                <p class="text-sm leading-5 text-gray-500">Are you sure you want to leave this team? Your access to the team and projects owned by it will be revoked.</p>
                            </div>
                        </div>
                    </div>
                    <div class="sm:mt-4 sm:flex sm:flex-row-reverse mt-5">
                        <span class="sm:ml-3 sm:w-auto flex w-full rounded-md shadow-sm">
                            <button wire:click="leaveTeam" type="button" class="hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red sm:text-sm sm:leading-5 inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md shadow-sm">
                                Leave
                            </button>
                        </span>
                        <span class="sm:mt-0 sm:w-auto flex w-full mt-3 rounded-md shadow-sm">
                            <button @click="open = false" type="button" class="hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline sm:text-sm sm:leading-5 inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm">
                                Cancel
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
