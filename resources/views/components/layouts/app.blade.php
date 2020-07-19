<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @livewireStyles
</head>

<body class="font-sans antialiased text-gray-800 bg-gray-100">
    <livewire:toast />

    <livewire:affiliate-banner />

    <div class="pb-32 bg-gray-800">
        <nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-gray-800">
            <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto">
                <div class="border-b border-gray-700">
                    <div class="sm:px-0 flex items-center justify-between h-16 px-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8" src="https://tailwindui.com/img/logos/workflow-mark-on-dark.svg" alt="{{ config('app.name') }}" />
                            </div>
                            <div class="md:block hidden">
                                <div class="flex items-baseline ml-10">
                                    <a href="{{ route('home') }}" class="focus:outline-none focus:text-white focus:bg-gray-700 px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-md">Dashboard</a>
                                    <a href="{{ route('team') }}" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 px-3 py-2 ml-4 text-sm font-medium text-gray-300 rounded-md">Team</a>
                                    <a href="#" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 px-3 py-2 ml-4 text-sm font-medium text-gray-300 rounded-md">Documentation</a>
                                </div>
                            </div>
                        </div>
                        <div class="md:block hidden">
                            <div class="md:ml-6 flex items-center ml-4">
                                <button class="hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 p-1 text-gray-400 border-2 border-transparent rounded-full" aria-label="Notifications">
                                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button>

                                <div @click.away="open = false" class="relative ml-3" x-data="{ open: false }">
                                    <div>
                                        <button @click="open = !open" class="focus:outline-none focus:shadow-solid flex items-center max-w-xs text-sm text-white rounded-full" id="user-menu" aria-label="User menu" aria-haspopup="true">
                                            <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->photo }}" alt="" />
                                        </button>
                                    </div>
                                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-48 mt-2 origin-top-right rounded-md shadow-lg">
                                        <div class="py-1 bg-white rounded-md shadow-xs">
                                            <a href="{{ route('account') }}" class="hover:bg-gray-100 block px-4 py-2 text-sm text-gray-700">Account Details</a>
                                            <a href="{{ route('security') }}" class="hover:bg-gray-100 block px-4 py-2 text-sm text-gray-700">Security & Privacy</a>
                                            <a href="{{ route('affiliate') }}" class="hover:bg-gray-100 block px-4 py-2 text-sm text-gray-700">Affiliate Program</a>
                                            <a href="{{ route('api') }}" class="hover:bg-gray-100 block px-4 py-2 text-sm text-gray-700">Developer API</a>
                                            <a href="{{ route('logout') }}" class="hover:bg-gray-100 block px-4 py-2 text-sm text-gray-700">Sign out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:hidden flex -mr-2">
                            <button @click="open = !open" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white inline-flex items-center justify-center p-2 text-gray-400 rounded-md">
                                <svg :class="{ 'hidden': open, 'block': !open }" class="block w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                <svg :class="{ 'hidden': !open, 'block': open }" class="hidden w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Mobile --}}
            <div :class="{ 'block': open, 'hidden': !open }" class="md:hidden hidden border-b border-gray-700">
                <div class="sm:px-3 px-2 py-3">
                    <a href="{{ route('home') }}" class="focus:outline-none focus:text-white focus:bg-gray-700 block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md">Dashboard</a>
                    <a href="{{ route('team') }}" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 block px-3 py-2 mt-1 text-base font-medium text-gray-300 rounded-md">Team</a>
                    <a href="#" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 block px-3 py-2 mt-1 text-base font-medium text-gray-300 rounded-md">Documentation</a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->photo }}" alt="" />
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                            <div class="mt-1 text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="px-2 mt-3" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                        <a href="{{ route('account') }}" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 block px-3 py-2 text-base font-medium text-gray-400 rounded-md" role="menuitem">Account Details</a>
                        <a href="{{ route('security') }}" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 block px-3 py-2 mt-1 text-base font-medium text-gray-400 rounded-md" role="menuitem">Security & Privacy</a>
                        <a href="{{ route('affiliate') }}" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 block px-3 py-2 mt-1 text-base font-medium text-gray-400 rounded-md" role="menuitem">Affiliate Program</a>
                        <a href="{{ route('api') }}" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 block px-3 py-2 mt-1 text-base font-medium text-gray-400 rounded-md" role="menuitem">Developer API</a>
                        <a href="{{ route('logout') }}" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 block px-3 py-2 mt-1 text-base font-medium text-gray-400 rounded-md" role="menuitem">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="py-10">
            <div class="max-w-7xl sm:px-6 lg:px-8 px-4 mx-auto">
                {{-- TODO: replace with breadcrumbs --}}
                <div class="mb-2">
                    <nav class="sm:hidden">
                        <a href="#" class="hover:text-gray-200 flex items-center text-sm font-medium leading-5 text-gray-400 transition duration-150 ease-in-out">
                            <svg class="flex-shrink-0 w-5 h-5 mr-1 -ml-1 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Back
                        </a>
                    </nav>
                    <nav class="sm:flex items-center hidden text-sm font-medium leading-5">
                        <a href="#" class="hover:text-gray-200 text-gray-400 transition duration-150 ease-in-out">Jobs</a>

                        <svg class="flex-shrink-0 w-5 h-5 mx-2 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>

                        <a href="#" class="hover:text-gray-200 text-gray-400 transition duration-150 ease-in-out">Engineering</a>

                        <svg class="flex-shrink-0 w-5 h-5 mx-2 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>

                        <a href="#" class="hover:text-gray-200 text-gray-400 transition duration-150 ease-in-out">Back End Developer</a>
                    </nav>
                </div>

                {{ $header }}
            </div>
        </header>
    </div>

    <main class="-mt-32">
        <div class="max-w-7xl sm:px-6 lg:px-8 px-4 pb-12 mx-auto">
            {{ $slot }}
        </div>
    </main>

    {{-- Scripts --}}
    {{-- <script src="{{ mix('/js/manifest.js') }}"></script> --}}
    {{-- <script src="{{ mix('/js/vendor.js') }}"></script> --}}
    <script src="{{ mix('/js/app.js') }}"></script>
    @livewireScripts
    @stack('scripts')

    @include('partials.usefathom')
</body>
</html>
