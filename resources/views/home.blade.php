@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Introduction Section -->
        <section id="about-me" class="min-h-screen flex flex-col md:flex-row items-center pt-16">
            <!-- Left Side - GM Image -->
            <div class="w-full md:w-1/2 flex justify-center items-center min-h-[50vh] md:min-h-[80vh] bg-gray-200 dark:bg-gray-700">
                <div class="flex items-center justify-center h-full w-full">
                    <img src="{{ asset($settings['gm_image'] ?? 'images/default/gm.jpg') }}" alt="General Manager" 
                         class="object-cover h-full w-full max-h-full">
                </div>
            </div>
            
            <!-- Right Side - Split into two parts -->
            <div class="w-full md:w-1/2 flex flex-col min-h-[50vh] md:min-h-[80vh]">
                <!-- Top Right - Company Logo -->
                <div class="flex-1 flex justify-center items-center p-8 bg-white dark:bg-gray-800">
                    <img src="{{ asset($settings['company_logo'] ?? 'images/default/logo.png') }}" alt="Company Logo" 
                         class="max-h-32 max-w-full">
                </div>
                
                <!-- Bottom Right - About Me Button -->
                <div class="flex-1 flex justify-center items-center p-8 bg-gray-100 dark:bg-gray-600">
                    <div class="w-full max-w-lg">
                        <button id="know-about-me-btn" 
                                class="w-full py-4 px-6 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                            Know About Me
                        </button>
                        
                        <!-- Hidden Panel (initially hidden) -->
                        <div id="about-me-panel" class="hidden mt-6 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transition-all duration-500 ease-in-out">
                            <h2 class="text-2xl font-bold mb-2 text-gray-800 dark:text-white">{{ $settings['gm_name'] ?? 'John Doe' }}</h2>
                            <h3 class="text-xl text-gray-600 dark:text-gray-300 mb-4">{{ $settings['gm_position'] ?? 'General Manager' }} at {{ $settings['company_name'] ?? 'Company' }}</h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $settings['gm_bio'] ?? 'Experienced General Manager with years of expertise in the industry.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Company Section -->
        <section id="about-company" class="min-h-screen flex flex-col md:flex-row items-center">
            <!-- Left Side - Title -->
            <div class="w-full md:w-1/2 flex justify-center items-center min-h-[50vh] md:min-h-[80vh] bg-white dark:bg-gray-800 p-8">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 dark:text-white text-center">About Company</h2>
            </div>
            
            <!-- Right Side - YouTube Video with Fallback -->
            <div class="w-full md:w-1/2 flex justify-center items-center min-h-[50vh] md:min-h-[80vh] bg-gray-100 dark:bg-gray-700 p-4">
                <div class="w-full aspect-w-16 aspect-h-9 relative">
                    <div id="about-company-video-container" class="w-full h-full relative">
                        <!-- Primary Iframe -->
                        <iframe id="about-company-video" class="w-full h-full" 
                                src="{{ $settings['about_company_video'] ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}?origin={{ request()->getSchemeAndHttpHost() }}&enablejsapi=1" 
                                title="About Company" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen></iframe>
                        
                        <!-- Fallback Content (Hidden by default) -->
                        <div id="about-company-fallback" class="hidden absolute inset-0 bg-gray-800 bg-opacity-80 flex flex-col items-center justify-center p-4 text-center">
                            <div class="text-red-400 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="text-white text-lg mb-4">This video cannot be displayed here.</p>
                            <a href="{{ preg_replace('/\/embed\//', '/watch?v=', $settings['about_company_video'] ?? 'https://www.youtube.com/watch?v=dQw4w9WgXcQ') }}" 
                               target="_blank" 
                               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                </svg>
                                Watch on YouTube
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Company Detail Section -->
        <section id="company-detail" class="min-h-screen flex flex-col md:flex-row-reverse items-center">
            <!-- Right Side - Title (appears on left on mobile) -->
            <div class="w-full md:w-1/2 flex justify-center items-center min-h-[50vh] md:min-h-[80vh] bg-white dark:bg-gray-800 p-8">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 dark:text-white text-center">Company Detail</h2>
            </div>
            
            <!-- Left Side - YouTube Video with Fallback -->
            <div class="w-full md:w-1/2 flex justify-center items-center min-h-[50vh] md:min-h-[80vh] bg-gray-100 dark:bg-gray-700 p-4">
                <div class="w-full aspect-w-16 aspect-h-9 relative">
                    <div id="company-detail-video-container" class="w-full h-full relative">
                        <!-- Primary Iframe -->
                        <iframe id="company-detail-video" class="w-full h-full" 
                                src="{{ $settings['company_detail_video'] ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}?origin={{ request()->getSchemeAndHttpHost() }}&enablejsapi=1" 
                                title="Company Detail" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen></iframe>
                        
                        <!-- Fallback Content (Hidden by default) -->
                        <div id="company-detail-fallback" class="hidden absolute inset-0 bg-gray-800 bg-opacity-80 flex flex-col items-center justify-center p-4 text-center">
                            <div class="text-red-400 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="text-white text-lg mb-4">This video cannot be displayed here.</p>
                            <a href="{{ preg_replace('/\/embed\//', '/watch?v=', $settings['company_detail_video'] ?? 'https://www.youtube.com/watch?v=dQw4w9WgXcQ') }}" 
                               target="_blank" 
                               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                </svg>
                                Watch on YouTube
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section id="portfolio" class="min-h-screen">
            @forelse ($portfolios as $index => $portfolio)
                <div class="flex flex-col md:flex-row items-center min-h-screen" id="portfolio-{{ $portfolio->id }}">
                    <!-- Left Side - PDF Viewer -->
                    <div class="w-full md:w-1/2 flex justify-center items-center min-h-[50vh] md:min-h-[80vh] bg-white dark:bg-gray-800 p-4">
                        <div class="w-full h-full overflow-auto" style="max-height: 80vh;">
                            <embed src="{{ asset($portfolio->pdf_path) }}" type="application/pdf" width="100%" height="100%" 
                                   class="border-0 shadow-lg" style="min-height: 70vh;">
                        </div>
                    </div>
                    
                    <!-- Right Side - Title and Logo -->
                    <div class="w-full md:w-1/2 flex flex-col justify-center items-center min-h-[50vh] md:min-h-[80vh] bg-gray-100 dark:bg-gray-700 p-8">
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 dark:text-white text-center mb-8">{{ $portfolio->title }}</h2>
                        
                        @if($portfolio->logo_path)
                            <img src="{{ asset($portfolio->logo_path) }}" alt="{{ $portfolio->title }} Logo" class="max-h-32 max-w-full">
                        @else
                            <img src="{{ asset($settings['company_logo'] ?? 'images/default/logo.png') }}" alt="Company Logo" class="max-h-32 max-w-full">
                        @endif
                        
                        <!-- Portfolio Navigation -->
                        @if(count($portfolios) > 1)
                            <div class="flex justify-center mt-12 space-x-4">
                                @foreach($portfolios as $navIndex => $navItem)
                                    <a href="#portfolio-{{ $navItem->id }}" 
                                       class="h-3 w-3 rounded-full {{ $navIndex === $index ? 'bg-blue-600' : 'bg-gray-400 hover:bg-gray-600' }} 
                                             transition duration-300 ease-in-out"></a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-700 p-8">
                    <h2 class="text-4xl font-bold text-gray-800 dark:text-white text-center mb-4">Portfolio</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-center">No portfolio items available yet.</p>
                </div>
            @endforelse
        </section>

        <!-- Contact Section -->
        <section id="contact" class="min-h-screen flex justify-center items-center py-16 bg-white dark:bg-gray-800">
            <div class="w-full max-w-lg px-4">
                <h2 class="text-4xl font-bold text-gray-800 dark:text-white text-center mb-12">Contact Me</h2>
                
                <form id="contact-form" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" id="name" name="name" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                        <textarea id="message" name="message" rows="6" required
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
                    
                    <div>
                        <button type="submit" 
                                class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-md shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                            Send Message
                        </button>
                    </div>
                </form>
                
                <!-- Success Message (initially hidden) -->
                <div id="contact-success" class="hidden mt-6 p-4 bg-green-100 text-green-700 rounded-md">
                    Thank you for your message! I'll get back to you soon.
                </div>
                
                <!-- Error Message (initially hidden) -->
                <div id="contact-error" class="hidden mt-6 p-4 bg-red-100 text-red-700 rounded-md">
                    There was an error sending your message. Please try again.
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // About Me Button Functionality
            const aboutMeBtn = document.getElementById('know-about-me-btn');
            const aboutMePanel = document.getElementById('about-me-panel');
            
            if (aboutMeBtn && aboutMePanel) {
                aboutMeBtn.addEventListener('click', function() {
                    aboutMePanel.classList.toggle('hidden');
                    if (!aboutMePanel.classList.contains('hidden')) {
                        aboutMeBtn.textContent = 'Hide About Me';
                    } else {
                        aboutMeBtn.textContent = 'Know About Me';
                    }
                });
            }
            
            // YouTube Video Error Handling
            function setupYouTubeErrorHandling(videoId, fallbackId) {
                const videoFrame = document.getElementById(videoId);
                const fallback = document.getElementById(fallbackId);
                
                if (videoFrame && fallback) {
                    // Listen for iframe load errors
                    videoFrame.addEventListener('error', function() {
                        videoFrame.style.display = 'none';
                        fallback.classList.remove('hidden');
                    });
                    
                    // Alternative error detection using message event
                    window.addEventListener('message', function(event) {
                        // Check if the message is from YouTube
                        if (event.origin.includes('youtube.com') && event.data) {
                            try {
                                const data = typeof event.data === 'string' ? JSON.parse(event.data) : event.data;
                                // Check for error events
                                if (data.event === 'onError' && data.info && event.source === videoFrame.contentWindow) {
                                    videoFrame.style.display = 'none';
                                    fallback.classList.remove('hidden');
                                }
                            } catch (e) {
                                // Parsing error, ignore
                            }
                        }
                    });
                    
                    // Check if iframe is empty or blocked after a short delay
                    setTimeout(function() {
                        try {
                            // Try to access the iframe content - will throw error if cross-origin issues
                            const iframeDocument = videoFrame.contentDocument || videoFrame.contentWindow.document;
                            // If we can access it but it's empty
                            if (!iframeDocument.body.innerHTML) {
                                videoFrame.style.display = 'none';
                                fallback.classList.remove('hidden');
                            }
                        } catch (e) {
                            // Cross-origin error expected, can't determine iframe content
                            // We'll rely on other error detection methods
                        }
                    }, 2000);
                }
            }
            
            // Setup error handling for both videos
            setupYouTubeErrorHandling('about-company-video', 'about-company-fallback');
            setupYouTubeErrorHandling('company-detail-video', 'company-detail-fallback');
            
            // Contact Form Functionality
            const contactForm = document.getElementById('contact-form');
            const contactSuccess = document.getElementById('contact-success');
            const contactError = document.getElementById('contact-error');
            
            if (contactForm) {
                contactForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(contactForm);
                    
                    try {
                        const response = await fetch('{{ route("contact.send") }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                            body: formData
                        });
                        
                        const data = await response.json();
                        
                        if (data.success) {
                            contactForm.reset();
                            contactSuccess.classList.remove('hidden');
                            contactError.classList.add('hidden');
                            
                            // Hide success message after 5 seconds
                            setTimeout(() => {
                                contactSuccess.classList.add('hidden');
                            }, 5000);
                        } else {
                            throw new Error('Form submission failed');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        contactError.classList.remove('hidden');
                        contactSuccess.classList.add('hidden');
                        
                        // Hide error message after 5 seconds
                        setTimeout(() => {
                            contactError.classList.add('hidden');
                        }, 5000);
                    }
                });
            }
        });
    </script>
@endsection