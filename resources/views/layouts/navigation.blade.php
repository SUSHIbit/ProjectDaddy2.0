<!-- resources/views/layouts/navigation.blade.php -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-lg w-full">
    <div class="container mx-auto px-4">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset($settings['company_logo'] ?? 'images/default/logo.png') }}" alt="Company Logo" class="h-12 w-auto">
                    <!-- Company name removed as requested -->
                </a>
            </div>
            
            <div class="hidden md:flex items-center space-x-1">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">Dashboard</a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-md transition duration-150 ease-in-out">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="#about-me" class="px-4 py-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">About Me</a>
                    <a href="#about-company" class="px-4 py-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">About Company</a>
                    <a href="#company-detail" class="px-4 py-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">Company Detail</a>
                    <a href="#portfolio" class="px-4 py-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">Portfolio</a>
                    <a href="#contact" class="px-4 py-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">Contact Me</a>
                    <a href="{{ route('login') }}" class="ml-3 px-5 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-150 ease-in-out">Admin</a>
                @endauth
            </div>
            
            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button id="mobile-menu-button" class="text-blue-600 hover:text-blue-800 focus:outline-none">
                    <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="mobile-menu-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path class="mobile-menu-close hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div class="hidden md:hidden absolute w-full bg-white shadow-lg rounded-b-lg" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">Dashboard</a>
                
                <form method="POST" action="{{ route('logout') }}" class="block w-full">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-md transition duration-150 ease-in-out">
                        Logout
                    </button>
                </form>
            @else
                <a href="#about-me" class="block px-4 py-3 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">About Me</a>
                <a href="#about-company" class="block px-4 py-3 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">About Company</a>
                <a href="#company-detail" class="block px-4 py-3 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">Company Detail</a>
                <a href="#portfolio" class="block px-4 py-3 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">Portfolio</a>
                <a href="#contact" class="block px-4 py-3 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition duration-150 ease-in-out">Contact Me</a>
                <a href="{{ route('login') }}" class="block mt-2 mx-2 px-4 py-3 text-center text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-150 ease-in-out">Admin</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Spacer to prevent content from hiding under fixed navbar -->
<div class="h-20"></div>