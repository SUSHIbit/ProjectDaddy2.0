<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Welcome to the Admin Dashboard</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold mb-4">Website Settings</h4>
                            <p class="mb-4">Update your personal information, company details and contact email.</p>
                            <a href="{{ route('admin.settings.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Manage Settings
                            </a>
                        </div>
                        
                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold mb-4">Portfolio Management</h4>
                            <p class="mb-4">Add, edit or remove portfolio items shown on your website.</p>
                            <a href="{{ route('admin.portfolios.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Manage Portfolios
                            </a>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="text-lg font-medium mb-4">Quick Links</h4>
                        <ul class="list-disc pl-5 space-y-2">
                            <li>
                                <a href="{{ route('home') }}" class="text-blue-600 dark:text-blue-400 hover:underline" target="_blank">
                                    View Public Website
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.edit') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                    Update Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>