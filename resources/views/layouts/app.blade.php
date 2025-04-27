<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GM Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-in-out;
        }
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-white w-full">
        @if(auth()->check())
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot ?? '' }}
                @yield('content')
            </main>
        @else
            <!-- Public Navigation -->
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="w-full">
                @yield('content')
            </main>

            <!-- Simplified Footer -->
            <footer class="bg-blue-800 text-white py-6 w-full">
                <div class="container mx-auto px-4">
                    <div class="text-center text-blue-200 text-sm">
                        <p>&copy; 2025 ALPS ELECTRIC (MALAYSIA) SDN. BHD.(181071-T). All rights reserved.</p>
                    </div>
                </div>
            </footer>
        @endif
    </div>

    <!-- Mobile Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuOpen = document.querySelector('.mobile-menu-open');
            const mobileMenuClose = document.querySelector('.mobile-menu-close');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                    mobileMenuOpen.classList.toggle('hidden');
                    mobileMenuClose.classList.toggle('hidden');
                });

                // Close menu when clicking on a link
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.add('hidden');
                        mobileMenuOpen.classList.remove('hidden');
                        mobileMenuClose.classList.add('hidden');
                    });
                });
            }
        });
    </script>
</body>
</html>