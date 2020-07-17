<x-layouts.auth>
    <x-slot name="header">
        Welcome to {{ config('app.name') }}
    </x-slot>

    <p class="text-sm leading-5 text-center text-gray-600">
        Enter your details and you will be able to invite co-workers to your team later for collaboration.
    </p>

    <form class="mt-6" action="{{ route('register') }}" method="POST">
        @csrf

        <div>
            <x-input.group type="text" name="team" label="Team Name" />
        </div>

        <div class="mt-6">
            <x-input.group type="text" name="name" label="Your Name" />
        </div>

        <div class="mt-6">
            <x-input.group type="email" name="email" label="E-Mail address" />
        </div>

        <div class="mt-6">
            <x-input.group type="password" name="password" label="Password" />
        </div>

        <div class="mt-6">
            <x-input.group type="password" name="password_confirmation" label="Confirm Password" />
        </div>

        <p class="mt-6 text-xs leading-5 text-center text-gray-600">
            By signing up, you agree to the <a href="#" class="underline">Terms of Service</a> and <a href="#" class="underline">Privacy Policy</a> of {{ config('app.name') }}.
        </p>

        <div class="mt-6">
            <button type="submit" class="group hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                Register
            </button>
        </div>
    </form>
</x-layouts.auth>
