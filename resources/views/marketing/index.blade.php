<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Meta Information --}}
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="application-name" content="{{ config('app.name') }}"/>

        {{-- Twitter --}}
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@awesomeapp" />
        <meta name="twitter:title" content="{{ config('app.name') }}" />
        <meta name="twitter:description" content="..." />
        <meta name="twitter:image" content="{{ config('app.url') }}/images/twitter-card.png" />
        <meta name="twitter:creator" content="@awesomeapp" />

        {{-- OpenGraph --}}
        <meta property="og:url" content="{{ config('app.url') }}" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{ config('app.name') }}" />
        <meta property="og:description" content="..." />
        <meta property="og:image" content="{{ config('app.url') }}/images/twitter-card.png" />

        {{-- Title --}}
        <title>@yield('title', config('app.name'))</title>

        {{-- Icons --}}
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/images/favicons/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/favicons/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/favicons/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/favicons/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/images/favicons/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/images/favicons/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/images/favicons/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/images/favicons/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="/images/favicons/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="/images/favicons/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="/images/favicons/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/images/favicons/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="/images/favicons/favicon-128x128.png" sizes="128x128" />
        <meta name="msapplication-TileColor" content="#009aff" />
        <meta name="msapplication-TileImage" content="/images/favicons/mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="/images/favicons/mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="/images/favicons/mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="/images/favicons/mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="/images/favicons/mstile-310x310.png" />

        {{-- Fonts --}}
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        {{-- CSS --}}
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    </head>

    <body class="bg-gray-50 font-sans antialiased">
        @include('marketing._banner')

        @include('marketing._header')

        @include('marketing._features')

        @include('marketing._pricing')

        @include('marketing._services')

        @include('marketing._faq')

        @include('marketing._footer')

        @include('marketing._cookie')

        @include('partials.usefathom')

        {{-- AlpineJS --}}
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.1.0/dist/alpine.js"></script>
    </body>
</html>
