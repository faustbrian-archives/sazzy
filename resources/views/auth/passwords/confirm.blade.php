<x-layouts.auth header="Confirm Password">
    <p class="text-sm leading-5 text-center text-gray-600">
        Please confirm your password before continuing.
    </p>

    <form class="mt-6" action="{{ route('password.confirm') }}" method="POST">
        @csrf

        <div>
            <x-input.group type="password" name="password" label="Password" />
        </div>

        <div class="mt-6">
            <button type="submit" class="group hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                Confirm Password
            </button>
        </div>
    </form>
</x-layouts.auth>
