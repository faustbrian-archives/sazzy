<div class="mb-8 bg-white rounded-lg shadow">
    <div class="sm:p-6 md:flex-row flex flex-col items-center justify-between px-4 py-5">
        <div class="md:w-auto w-full">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Name
            </h3>
            <div class="max-w-xl2 mt-2 text-sm leading-5 text-gray-600">
                <p>Your name will be used for presentation and billing.</p>
            </div>
        </div>
        <div class="md:mt-0 md:w-auto w-full mt-4">
            <form wire:submit.prevent="save" class="md:flex-row flex flex-col items-center">
                <div class="w-full">
                    <label for="name" class="sr-only">Name</label>
                    <div class="relative rounded-md shadow-sm">
                        <input id="name" class="form-input sm:text-sm sm:leading-5 block w-full" wire:model="name" />
                    </div>
                </div>
                <span class="sm:mt-0 sm:ml-3 sm:w-auto inline-flex w-full mt-3 rounded-md shadow-sm">
                    <button type="submit" class="hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 sm:w-auto sm:text-sm sm:leading-5 inline-flex items-center justify-center w-full px-4 py-2 font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                        Save
                    </button>
                </span>
            </form>
        </div>
    </div>
</div>
