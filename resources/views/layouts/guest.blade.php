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
    <body class="font-sans text-gray-900 antialiased bg-gray-100">


        <header class="bg-white shadow-md p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl"> 
                    <a href="/" class="text-gray-800 hover:text-blue-500"> NeighborhoodNotifier  </a>
                </h1>

                <nav>
                    <ul class="flex space-x-4">
                        <li><a href="/" class="text-gray-800 hover:text-blue-500">Home</a></li>
                        <li><a href="/about" class="text-gray-800 hover:text-blue-500">About</a></li>
                        <li><a href="/events" class="text-gray-800 hover:text-blue-500">Events</a></li>
                        <li><a href="/contact" class="text-gray-800 hover:text-blue-500">Contact</a></li>

                        @auth
                            <li><a href="/dashboard" class="text-gray-800 hover:text-blue-500">Dashboard</a></li>
                        @else
                            @if (Route::has('login'))
                                <li> <a href="/register" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Register</a> </li>
                            @endif
                            
                            @if (Route::has('login'))
                                <li> <a href="/login" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Login</a> </li>
                            @endif
                        @endif
                        
                    </ul>
                </nav>
            </div>
        </header>


{{--             @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end bg-black">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif --}}


            {{ $slot }}
    </body>
</html>
