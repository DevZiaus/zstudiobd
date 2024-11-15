<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ URL::asset('favicon.png') }}" type="image/png"/>

        <title>{{ config('app.name', 'ZStudio') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{asset('custom')}}/styles.css" />
        <style>
            .card-footer, .progress {
                display: none;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900" style="padding-top: 40px;">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow py-4">
                    <!-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"> -->
                        {{ $header }}
                    <!-- </div> -->
                </header>
            @endif
            @include('layouts.frontendsidebar')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @include('layouts.footer')

        <!-- <script type="text/javascript" src="{{asset('custom')}}/upload.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
        <script type="text/javascript">
            var Clipboard = new ClipboardJS('.btn');
        </script>
        @stack('scripts')
    </body>
</html>
