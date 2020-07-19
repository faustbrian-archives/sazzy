<div class="relative overflow-hidden bg-gray-800">
    <div class="sm:block sm:absolute sm:inset-0 hidden">
        <svg class="lg:top-0 lg:mt-28 lg:mb-0 xl:transform-none xl:translate-x-0 absolute bottom-0 right-0 mb-48 text-gray-700 transform translate-x-1/2"
            width="364" height="384" viewBox="0 0 364 384" fill="none">
            <defs>
                <pattern id="eab71dd9-9d7a-47bd-8044-256344ee00d0" x="0" y="0" width="20" height="20"
                    patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" fill="currentColor" />
                </pattern>
            </defs>
            <rect width="364" height="384" fill="url(#eab71dd9-9d7a-47bd-8044-256344ee00d0)" />
        </svg>
    </div>
    <div class="sm:pb-32 relative pt-6 pb-12">
        <nav class="sm:px-6 relative flex items-center justify-between max-w-screen-xl px-4 mx-auto">
            <div class="flex items-center flex-1">
                <div class="md:w-auto flex items-center justify-between w-full">
                    <a href="#" aria-label="Home">
                        <img class="sm:h-10 w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark-on-dark.svg"
                            alt="Logo">
                    </a>
                    <div class="md:hidden flex items-center -mr-2">
                        <button type="button"
                            class="hover:bg-gray-700 focus:outline-none focus:bg-gray-700 inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md"
                            id="main-menu" aria-label="Main menu" aria-haspopup="true">
                            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="md:flex md:ml-10 hidden space-x-10">
                    <a href="#"
                        class="hover:text-gray-300 font-medium text-white transition duration-150 ease-in-out">Product</a>
                    <a href="#"
                        class="hover:text-gray-300 font-medium text-white transition duration-150 ease-in-out">Features</a>
                    <a href="#"
                        class="hover:text-gray-300 font-medium text-white transition duration-150 ease-in-out">Marketplace</a>
                    <a href="#"
                        class="hover:text-gray-300 font-medium text-white transition duration-150 ease-in-out">Company</a>
                </div>
            </div>
            <div class="md:flex hidden">
                <a href="#"
                    class="hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray focus:border-gray-700 active:bg-gray-700 inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-gray-600 border border-transparent rounded-md">
                    Log in
                </a>
            </div>
        </nav>

        <!--
      Mobile menu, show/hide based on menu open state.

      Entering: "duration-150 ease-out"
        From: "opacity-0 scale-95"
        To: "opacity-100 scale-100"
      Leaving: "duration-100 ease-in"
        From: "opacity-100 scale-100"
        To: "opacity-0 scale-95"
    -->
        <div class="md:hidden absolute inset-x-0 top-0 p-2 transition origin-top-right transform">
            <div class="rounded-lg shadow-md">
                <div class="overflow-hidden bg-white rounded-lg shadow-xs" role="menu" aria-orientation="vertical"
                    aria-labelledby="main-menu">
                    <div class="flex items-center justify-between px-5 pt-4">
                        <div>
                            <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark-on-white.svg"
                                alt="">
                        </div>
                        <div class="-mr-2">
                            <button type="button"
                                class="hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md"
                                aria-label="Close menu">
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <a href="#"
                            class="hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md"
                            role="menuitem">Product</a>
                        <a href="#"
                            class="hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md"
                            role="menuitem">Features</a>
                        <a href="#"
                            class="hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md"
                            role="menuitem">Marketplace</a>
                        <a href="#"
                            class="hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md"
                            role="menuitem">Company</a>
                    </div>
                    <div>
                        <a href="#"
                            class="bg-gray-50 hover:bg-gray-100 hover:text-teal-700 focus:outline-none focus:bg-gray-100 focus:text-teal-700 block w-full px-5 py-3 font-medium text-center text-teal-600 transition duration-150 ease-in-out"
                            role="menuitem">
                            Log in
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <main class="sm:mt-16 md:mt-20 lg:mt-24 mt-8">
            <div class="max-w-screen-xl mx-auto">
                <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                    <div
                        class="sm:px-6 sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left lg:flex lg:items-center px-4">
                        <div>
                            <a href="#"
                                class="sm:text-base lg:text-sm xl:text-base hover:text-gray-200 inline-flex items-center p-1 pr-2 text-white bg-gray-900 rounded-full">
                                <span
                                    class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-teal-500 rounded-full">We're
                                    hiring</span>
                                <span class="ml-4 text-sm leading-5">Visit our careers page</span>
                                <svg class="w-5 h-5 ml-2 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <h2
                                class="sm:mt-5 sm:leading-none sm:text-6xl lg:mt-6 lg:text-5xl xl:text-6xl mt-4 text-4xl font-extrabold leading-10 tracking-tight text-white">
                                Data to enrich your
                                <br class="md:inline hidden">
                                <span class="text-teal-400">online business</span>
                            </h2>
                            <p class="sm:mt-5 sm:text-xl lg:text-lg xl:text-xl mt-3 text-base text-gray-300">
                                Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat
                                commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua ad ad non deserunt sunt.
                            </p>
                            <p class="sm:mt-10 mt-8 text-sm font-semibold tracking-wide text-white uppercase">Used by
                            </p>
                            <div class="sm:mx-auto sm:max-w-lg lg:ml-0 w-full mt-5">
                                <div class="flex flex-wrap items-start justify-between">
                                    <div class="flex justify-center px-1">
                                        <img class="h-9 sm:h-10" src="https://tailwindui.com/img/logos/tuple-logo.svg"
                                            alt="Tuple">
                                    </div>
                                    <div class="flex justify-center px-1">
                                        <img class="h-9 sm:h-10"
                                            src="https://tailwindui.com/img/logos/workcation-logo.svg" alt="Workcation">
                                    </div>
                                    <div class="flex justify-center px-1">
                                        <img class="h-9 sm:h-10"
                                            src="https://tailwindui.com/img/logos/statickit-logo.svg" alt="StaticKit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sm:mt-16 lg:mt-0 lg:col-span-6 mt-12">
                        <div class="sm:max-w-md sm:w-full sm:mx-auto sm:rounded-lg sm:overflow-hidden bg-white">
                            <div class="sm:px-10 px-4 py-8">
                                <h1 class="text-2xl font-bold leading-5 text-gray-700">
                                    Sign up and get started today!
                                </h1>

                                <div class="mt-6">
                                    <form action="#" method="POST" class="space-y-6">
                                        <div>
                                            <label for="name" class="sr-only">
                                                Full name
                                            </label>
                                            <div class="rounded-md shadow-sm">
                                                <input id="name" placeholder="Full name" required
                                                    class="focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="mobile-or-email" class="sr-only">
                                                Mobile number or email
                                            </label>
                                            <div class="rounded-md shadow-sm">
                                                <input id="mobile-or-email" placeholder="Mobile number or email"
                                                    required
                                                    class="focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="password" class="sr-only">
                                                Password
                                            </label>
                                            <div class="rounded-md shadow-sm">
                                                <input id="password" type="password" placeholder="Password" required
                                                    class="focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none">
                                            </div>
                                        </div>

                                        <div>
                                            <span class="block w-full rounded-md shadow-sm">
                                                <button type="submit"
                                                    class="hover:bg-teal-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal active:bg-teal-700 flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-teal-600 border border-transparent rounded-md">
                                                    Create your account
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="bg-gray-50 sm:px-10 px-4 py-6 border-t-2 border-gray-200">
                                <p class="text-xs leading-5 text-gray-500">By signing up, you agree to our <a href="#"
                                        class="hover:underline font-medium text-gray-900">Terms</a>, <a href="#"
                                        class="hover:underline font-medium text-gray-900">Data Policy</a> and <a
                                        href="#" class="hover:underline font-medium text-gray-900">Cookies Policy</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
