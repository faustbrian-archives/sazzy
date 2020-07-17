<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Information -->
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', config('app.name'))</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @stack('scripts')
    </head>

    <body class="font-sans antialiased text-gray-700">
        <div class="bg-gray-50 sm:px-6 lg:px-8 flex flex-col justify-center min-h-screen py-12">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <a href="{{ route('login') }}">
                    <img class="w-auto h-8 mx-auto" src="https://tailwindui.com/img/tailwindui-logo.svg" alt="{{ config('app.name') }}" />
                </a>

                <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                    {{ $header }}
                </h2>
            </div>

            @if(empty($type))
                <div class="sm:mx-auto sm:w-full sm:max-w-md mt-8">
            @else
                <div class="sm:mx-auto sm:w-full sm:max-w-xl mt-8">
            @endif
                <div class="sm:rounded-lg sm:px-10 px-4 py-8 bg-white shadow">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
