<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <h3 class="text-xl font-bold mb-6">Welcome to the Admin Dashboard</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Website Settings Section -->
                        <div class="bg-gray-800 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold mb-4">Website Settings</h4>
                            <p class="mb-4">Update your personal information, company details and contact email.</p>
                            <a href="{{ route('admin.settings.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                MANAGE SETTINGS
                            </a>
                        </div>
                        
                        <!-- Portfolio Management Section -->
                        <div class="bg-gray-800 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold mb-4">Portfolio Management</h4>
                            <p class="mb-4">Add, edit or remove portfolio items shown on your website.</p>
                            <a href="{{ route('admin.portfolios.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                MANAGE PORTFOLIOS
                            </a>
                        </div>

                        <!-- Contact Messages Section -->
                        <div class="bg-gray-800 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold mb-4">Contact Messages</h4>
                            <p class="mb-4">View messages submitted by visitors through the contact form.</p>
                            <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                VIEW MESSAGES
                            </a>
                        </div>
                        
                        <!-- Quick Links Section -->
                        <div class="bg-gray-800 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold mb-4">Quick Links</h4>
                            <ul class="space-y-3">
                                <li>
                                    <a href="{{ route('home') }}" class="flex items-center text-blue-400 hover:text-blue-300 transition" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        View Public Website
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="flex items-center text-blue-400 hover:text-blue-300 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Update Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>