<x-layouts.auth header="Log in to your account">
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <x-input.group type="email" name="email" label="E-Mail Address" />
        </div>

        <div class="mt-6">
            <x-input.group type="password" name="password" label="Password" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember_me" class="form-checkbox w-4 h-4 text-teal-600 transition duration-150 ease-in-out" />

                <label for="remember_me" class="block ml-2 text-sm leading-5 text-gray-900">
                    Remember me
                </label>
            </div>

            <div class="text-sm leading-5">
                <a href="{{ url('/password/reset') }}" class="hover:text-teal-500 focus:outline-none focus:underline font-medium text-teal-600 transition duration-150 ease-in-out">
                    Forgot your password?
                </a>
            </div>
        </div>

        <div class="mt-6">
            <span class="block w-full rounded-md shadow-sm">
                <button type="submit" class="group hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                    Sign in
                </button>
            </span>
        </div>
    </form>

    <div class="mt-6">
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>

            <div class="relative flex justify-center text-sm leading-5">
                <span class="px-2 text-gray-500 bg-white">
                    Don't have an account?
                </span>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('register') }}" class="hover:border-gray-400 focus:outline-none focus:border-gray-400 sm:text-sm sm:leading-5 block w-full px-3 py-2 font-medium text-center text-gray-900 border border-gray-300 rounded-md">
                Start your free trial today!
            </a>
        </div>
    </div>
</x-layouts.auth>
