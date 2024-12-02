<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <div class="flex">
                <!-- Sidebar -->
                <aside class="w-64 bg-iceblue text-white min-h-screen">
                    <div class="p-4 text-lg font-bold">
                        Admin Dashboard
                    </div>

                    <nav class="mt-4">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 hover:bg-blue-200">
                            <span class="material-icons"></span>
                            <span class="ml-2">Dashboard</span>
                        </a>
                        <a href="/crud-table" class="flex items-center px-4 py-2 hover:bg-blue-200">
                            <span class="material-icons"></span>
                            <span class="ml-2">Manage</span>
                        </a>
                        <a href="crud-table/{id}" class="flex items-center px-4 py-2 hover:bg-blue-200">
                            <span class="material-icons"></span>
                            <span class="ml-2">Product</span>
                        </a>
                        <a href="" class="flex items-center px-4 py-2 hover:bg-blue-200">
                            <span class="material-icons"></span>
                            <span class="ml-2">Report</span>
                        </a>
                        <a href="" class="flex items-center px-4 py-2 hover:bg-blue-200">
                            <span class="material-icons"></span>
                            <span class="ml-2">About Us</span>
                        </a>
                        <a href="" class="flex items-center px-4 py-2 hover:bg-blue-200 mt-auto">
                            <span class="material-icons"></span>
                            <span class="ml-2">Setting</span>
                        </a>
                        <a href="" class="flex items-center px-4 py-2 hover:bg-blue-200">
                            <span class="material-icons"></span>
                            <span class="ml-2">Help</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>

                    </nav>


                </aside>

                <!-- Main Content -->
                <main class="flex-1 p-6 bg-white">
                    {{ $slot }}
                </main>
            </div>
        </div>
</html>
