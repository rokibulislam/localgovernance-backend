<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'NeighborhoodNotifier') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">

{{--         <div class="flex h-screen bg-gray-200">
            <!-- Sidebar -->
            <div class="w-64 bg-white shadow-md">
                <div class="p-5 bg-gray-800 text-white text-lg font-medium">
                    Dashboard
                </div>
                <ul class="p-5">
                    <li>
                        <a href="#" class="block py-2.5 px-4 hover:bg-gray-100">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2.5 px-4 hover:bg-gray-100">Profile</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2.5 px-4 hover:bg-gray-100">Settings</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2.5 px-4 hover:bg-gray-100">Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-10 text-2xl font-bold">
                Welcome to your Dashboard
            </div>
        </div>
     --}}


        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
