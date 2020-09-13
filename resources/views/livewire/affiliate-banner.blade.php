<div>
    @if($affiliate)
        <div class="sm:pb-5 fixed inset-x-0 bottom-0 pb-2">
            <div class="sm:px-6 lg:px-8 max-w-screen-xl px-2 mx-auto">
                <div class="sm:p-3 p-2 bg-teal-600 rounded-lg shadow-lg">
                    <div class="flex flex-wrap items-center justify-between">
                        <div class="flex items-center flex-1 w-0">
                            <span>
                                <img src="{{ $affiliate->photo }}" alt="{{ $affiliate->name }}" class="w-8 h-8 rounded-full" />
                            </span>
                            <p class="ml-3 font-medium text-white truncate">
                                <span>Your friend {{ $affiliate->name }} has invited you to try {{ config('app.name') }}</span>
                            </p>
                        </div>
                        <div class="sm:order-2 sm:mt-0 sm:w-auto flex-shrink-0 order-3 w-full mt-2">
                            <div class="rounded-md shadow-sm">
                                <a href="{{ route('register') }}" class="hover:text-teal-500 focus:outline-none focus:shadow-outline flex items-center justify-center px-4 py-2 text-sm font-medium leading-5 text-teal-600 transition duration-150 ease-in-out bg-white border border-transparent rounded-md">
                                    Start your trial
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
