<x-layouts.auth header="Two-Factor Authentication">
    <form action="{{ url('/login/token') }}" method="POST">
        @csrf

        <div>
            <x-input.group type="password" name="token" label="Token" />
        </div>

        <div class="mt-6">
            <button type="submit" class="group hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                Verify
            </button>
        </div>
    </form>
</x-layouts.auth>
