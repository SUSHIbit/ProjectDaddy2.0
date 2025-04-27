<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Website Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Personal Information</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="gm_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your Full Name</label>
                                    <input type="text" name="gm_name" id="gm_name" value="{{ old('gm_name', $settings['gm_name'] ?? '') }}" required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @error('gm_name')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="gm_position" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your Position</label>
                                    <input type="text" name="gm_position" id="gm_position" value="{{ old('gm_position', $settings['gm_position'] ?? '') }}" required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @error('gm_position')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <label for="gm_bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Professional Bio</label>
                                <textarea name="gm_bio" id="gm_bio" rows="4"
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('gm_bio', $settings['gm_bio'] ?? '') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">A brief professional biography that will be displayed in the "About Me" section. This field is optional.</p>
                                @error('gm_bio')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <label for="gm_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your Title/Position</label>
                                <input type="text" name="gm_title" id="gm_title" value="{{ old('gm_title', $settings['gm_title'] ?? '') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('gm_title')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="gm_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your Email</label>
                                <input type="email" name="gm_email" id="gm_email" value="{{ old('gm_email', $settings['gm_email'] ?? '') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('gm_email')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="gm_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your Phone Number</label>
                                <input type="text" name="gm_phone" id="gm_phone" value="{{ old('gm_phone', $settings['gm_phone'] ?? '') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('gm_phone')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <label for="gm_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your Photo</label>
                                
                                @if(isset($settings['gm_image']))
                                    <div class="mt-2 mb-4">
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Current Image:</p>
                                        <img src="{{ asset($settings['gm_image']) }}" alt="General Manager" class="h-40 object-cover rounded-md">
                                    </div>
                                @endif
                                
                                <input type="file" name="gm_image" id="gm_image" accept="image/*"
                                       class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-300 file:mr-4 file:py-2 file:px-4
                                       file:rounded-md file:border-0 file:text-sm file:font-semibold
                                       file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100
                                       dark:file:bg-gray-700 dark:file:text-blue-300">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload your professional photo (max 2MB). For best results, use an image with portrait orientation.</p>
                                @error('gm_image')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-8 pt-6 border-t border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Company Information</h3>
                            
                            <div>
                                <label for="company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Name</label>
                                <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $settings['company_name'] ?? '') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('company_name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <label for="company_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Phone Number</label>
                                <input type="text" name="company_phone" id="company_phone" value="{{ old('company_phone', $settings['company_phone'] ?? '') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('company_phone')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="company_extension" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Extension (Optional)</label>
                                <input type="text" name="company_extension" id="company_extension" value="{{ old('company_extension', $settings['company_extension'] ?? '') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('company_extension')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="company_website" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Website URL</label>
                                <input type="url" name="company_website" id="company_website" value="{{ old('company_website', $settings['company_website'] ?? '') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('company_website')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="company_website_display" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Website Display Text</label>
                                <input type="text" name="company_website_display" id="company_website_display" value="{{ old('company_website_display', $settings['company_website_display'] ?? '') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">How the website URL should be displayed (e.g. www.example.com)</p>
                                @error('company_website_display')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <label for="company_logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Logo</label>
                                
                                @if(isset($settings['company_logo']))
                                    <div class="mt-2 mb-4">
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Current Logo:</p>
                                        <img src="{{ asset($settings['company_logo']) }}" alt="Company Logo" class="h-20">
                                    </div>
                                @endif
                                
                                <input type="file" name="company_logo" id="company_logo" accept="image/*"
                                       class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-300 file:mr-4 file:py-2 file:px-4
                                       file:rounded-md file:border-0 file:text-sm file:font-semibold
                                       file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100
                                       dark:file:bg-gray-700 dark:file:text-blue-300">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload your company logo (max 2MB). Transparent PNG is recommended.</p>
                                @error('company_logo')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <label for="about_company_video" class="block text-sm font-medium text-gray-700 dark:text-gray-300">About Company Video URL</label>
                                <input type="text" name="about_company_video" id="about_company_video" 
                                       value="{{ old('about_company_video', $settings['about_company_video'] ?? '') }}" required
                                       placeholder="https://www.youtube.com/watch?v=VIDEO_ID"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Enter any YouTube URL format (watch, shortened, or embed) - the system will automatically convert it to the correct format.</p>
                                @error('about_company_video')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <label for="company_detail_video" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Detail Video URL</label>
                                <input type="text" name="company_detail_video" id="company_detail_video" 
                                       value="{{ old('company_detail_video', $settings['company_detail_video'] ?? '') }}" required
                                       placeholder="https://www.youtube.com/watch?v=VIDEO_ID"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Enter any YouTube URL format (watch, shortened, or embed) - the system will automatically convert it to the correct format.</p>
                                @error('company_detail_video')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-8 pt-6 border-t border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Location Information</h3>
                            
                            <div>
                                <label for="location1_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Primary Location Name</label>
                                <input type="text" name="location1_name" id="location1_name" value="{{ old('location1_name', $settings['location1_name'] ?? '') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('location1_name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <label for="location1_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Primary Location Address</label>
                                <textarea name="location1_address" id="location1_address" rows="3" required
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('location1_address', $settings['location1_address'] ?? '') }}</textarea>
                                @error('location1_address')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <label for="location2_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Secondary Location Name (Optional)</label>
                                <input type="text" name="location2_name" id="location2_name" value="{{ old('location2_name', $settings['location2_name'] ?? '') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('location2_name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <label for="location2_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Secondary Location Address (Optional)</label>
                                <textarea name="location2_address" id="location2_address" rows="3"
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('location2_address', $settings['location2_address'] ?? '') }}</textarea>
                                @error('location2_address')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-8 pt-6 border-t border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Contact Information</h3>
                            
                            <div>
                                <label for="contact_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact Email</label>
                                <input type="email" name="contact_email" id="contact_email" 
                                       value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">All messages from the contact form will be sent to this email address.</p>
                                @error('contact_email')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 focus:bg-gray-300 dark:focus:bg-gray-600 active:bg-gray-400 dark:active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-3">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>