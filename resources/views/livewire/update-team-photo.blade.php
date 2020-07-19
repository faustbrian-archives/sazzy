<div class="mb-8 bg-white rounded-lg shadow">
    <div class="sm:p-6 md:flex-row flex flex-col items-center justify-between px-4 py-5">
        <div class="md:w-auto w-full">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Team Photo
            </h3>
            <div class="max-w-xl2 mt-2 text-sm leading-5 text-gray-600">
                <p>Your team's photo will be used for presentation.</p>
            </div>
        </div>
        <div class="md:mt-0 md:w-auto w-full mt-4">
            <div class="flex items-center">
                <span class="w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                    <img src="{{ $this->team->photo }}" alt="{{ $this->team->name }}" class="w-full h-full text-gray-300" />
                </span>

                <span
                    class="ml-5 rounded-md shadow-sm"
                    x-data="{ isUploading: false, select() { document.getElementById('photo').click(); } }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                >
                    <input
                        id="photo"
                        type="file"
                        class="absolute top-0 hidden block opacity-0 cursor-pointer"
                        wire:model="photo">

                    <button @click="select()" type="button" class="hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md">
                        <div x-show="!isUploading">Change</div>
                        <div x-show="isUploading">Uploading...</div>
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>
