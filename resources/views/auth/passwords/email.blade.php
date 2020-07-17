<x-layouts.auth header="Reset your password">
    <p class="text-sm leading-5 text-center text-gray-600">
        Enter your email and we'll send you a link to reset your password.
    </p>

    <form class="mt-6" action="{{ url('password/email') }}" method="POST">
        @csrf

        <div>
            <x-input.group type="email" name="email" label="E-Mail address" />
        </div>

        <div class="mt-6">
            <button type="submit" class="group hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                Send Password Reset Link
            </button>
        </div>
    </form>
</x-layouts.auth>
