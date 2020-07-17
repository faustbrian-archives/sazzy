<x-layouts.auth header="Login via Emergency Token">
    <p class="text-sm leading-5 text-center text-gray-600">
        After logging in via your emergency token, two-factor authentication will be disabled for your account. If you would like to maintain two-factor authentication security, you should re-enable it after logging in.
    </p>

    <form class="mt-6" action="{{ url('login/emergency-token') }}" method="POST">
        @csrf

        <div>
            <x-input.group type="password" name="token" label="Emergency Token" />
        </div>

        <div class="mt-6">
            <button type="submit" class="group hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                Sign in
            </button>
        </div>
    </form>
</x-layouts.auth>
