<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PescadosTF</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 dark:text-white bg-gray-700 dark:bg-gray-700 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center pt-10 sm:pt-[calc(20px-40px)] bg-gray-100 dark:bg-gray-200">
            <div class="w-11/12 sm:w-full max-w-lg mt-4 px-6 py-8 bg-gray-300 dark:bg-gray-900 text-gray-900 dark:text-white shadow-lg rounded-3xl sm:rounded-lg shadow-lg">
                <div class="py-4 flex justify-center mb-6">
                    <a href="/">
                        <x-application-logo />
                    </a>
                </div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
