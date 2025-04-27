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
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
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
                <main>
                    @yield('content')
                </main>

            <!-- Footer -->
            <footer class="bg-blue-800 text-white py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-6 md:mb-0">
                            <h3 class="text-xl font-semibold mb-2">{{ $settings['company_name'] ?? 'Company' }}</h3>
                            <p class="text-blue-200">Professional Portfolio and Information</p>
                        </div>
                        
                        <div class="flex flex-col mb-6 md:mb-0">
                            <h4 class="text-lg font-medium mb-2">Navigation</h4>
                            <div class="flex flex-col space-y-1">
                                <a href="#about-me" class="text-blue-200 hover:text-white transition duration-150">About Me</a>
                                <a href="#about-company" class="text-blue-200 hover:text-white transition duration-150">About Company</a>
                                <a href="#company-detail" class="text-blue-200 hover:text-white transition duration-150">Company Detail</a>
                                <a href="#portfolio" class="text-blue-200 hover:text-white transition duration-150">Portfolio</a>
                                <a href="#contact" class="text-blue-200 hover:text-white transition duration-150">Contact Me</a>
                            </div>
                        </div>
                        
                        <div class="flex flex-col">
                            <h4 class="text-lg font-medium mb-2">Contact</h4>
                            <a href="mailto:{{ $settings['contact_email'] ?? 'contact@example.com' }}" class="text-blue-200 hover:text-white transition duration-150">
                                {{ $settings['contact_email'] ?? 'contact@example.com' }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-8 border-t border-blue-700 text-center text-blue-300 text-sm">
                        <p>&copy; {{ date('Y') }} {{ $settings['company_name'] ?? 'Company' }}. All rights reserved.</p>
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