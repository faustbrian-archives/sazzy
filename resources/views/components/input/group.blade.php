@unless(empty($label))
    <label for="input_{{ $name }}" class="block text-sm font-medium leading-5 text-gray-700">
        {{ $label }}
    </label>
@endunless

<div class="mt-1 rounded-md shadow-sm">
    @if(empty($type))
        <input
            type="text"
            name="{{ $name }}"
            wire:model="{{ $name }}"
            class="@error($name) border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
    @elseif($type === 'select')
        <select
            name="{{ $name }}"
            wire:model="{{ $name }}"
            class="form-select sm:text-sm sm:leading-5 block w-full transition duration-150 ease-in-out">
            {{ $slot }}
        </select>
    @elseif($type === 'textarea')
        <textarea
            name="{{ $name }}"
            wire:model="{{ $name }}"
            class="@error($name) border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
            rows="5"
        ></textarea>
    @elseif($type === 'image')
        <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md" x-data="{{ $method }}({ url: '{{ $url }}' })">
            <div class="text-center">
                <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <p class="mt-1 text-sm text-gray-600">
                    <input id="{{ $name }}" type="file" class="absolute top-0 block opacity-0 cursor-pointer" @change.prevent="upload($event)" />

                    <button type="button" class="hover:text-teal-500 focus:outline-none focus:underline font-medium text-teal-600 transition duration-150 ease-in-out" @click="select()">
                        Upload a file
                    </button>
                </p>

                <p class="mt-1 text-xs text-gray-500">
                    PNG, JPG, GIF up to 1MB
                </p>
            </div>
        </div>
    @elseif($type === 'toggle')
        <span wire:click="toggleProperty('{{ $name }}')" x-data="{ value: {{ $value }}, toggle() { this.value = !this.value } }" :class="{ 'bg-gray-200': !value, 'bg-teal-600': value }" class="flex-no-shrink w-11 focus:outline-none focus:shadow-outline relative inline-block h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer" role="checkbox" tabindex="0" @click="toggle()" @keydown.space.prevent="toggle()" :aria-checked="value.toString()">
            <span aria-hidden="true" :class="{ 'translate-x-5': value, 'translate-x-0': !value }" class="relative inline-block w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full shadow">
                <span :class="{ 'opacity-0 ease-out duration-100': value, 'opacity-100 ease-in duration-200': !value }" class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity">
                    <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                        <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>

                <span :class="{ 'opacity-100 ease-in duration-200': value, 'opacity-0 ease-out duration-100': !value }" class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity">
                    <svg class="w-3 h-3 text-teal-600" fill="currentColor" viewBox="0 0 12 12">
                        <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                    </svg>
                </span>
            </span>
        </span>
    @else
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            wire:model="{{ $name }}"
            class="@error($name) border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
    @endif
</div>

@error($name)
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
@enderror
