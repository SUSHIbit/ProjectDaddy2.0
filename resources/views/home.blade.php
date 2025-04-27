@extends('layouts.app')

@section('content')
<!-- Hero Section: About Me with Full-Page Dark Background and Content Left, Text Right -->
<section id="about-me" class="min-h-[70vh] flex items-center bg-blue-900 text-white w-full">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row items-center md:space-x-12">
            <!-- Left Side - Circular Image -->
            <div class="w-full md:w-1/2 flex justify-center mb-10 md:mb-0">
                <div class="rounded-full overflow-hidden h-64 w-64 md:h-72 md:w-72 border-4 border-blue-400 shadow-xl">
                    <img src="{{ asset($settings['gm_image'] ?? 'images/default/gm.jpg') }}" alt="General Manager" 
                        class="object-cover w-full h-full transform transition duration-500 hover:scale-110">
                </div>
            </div>
            
            <!-- Right Side - Text Content -->
            <div class="w-full md:w-1/2">
                <div class="text-center md:text-left">
                    <div class="mb-4">
                        <img src="{{ asset($settings['company_logo'] ?? 'images/default/logo.png') }}" alt="Company Logo" class="h-16 md:h-20 inline-block">
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-3">{{ $settings['gm_name'] ?? 'Mohammad \'Arief Asyraf' }}</h1>
                    <h2 class="text-2xl text-blue-300 mb-6">{{ $settings['gm_position'] ?? 'General Manager' }}</h2>
                    
                    @if(!empty($settings['gm_bio']))
                    <p class="text-blue-100 mb-6 hidden" id="gm-bio">{{ $settings['gm_bio'] }}</p>
                    @endif
                    
                    <!-- This is the info section that will toggle -->
                    <div id="gm-details" class="hidden mb-6">
                        <!-- Position and contact information -->
                        <div class="mb-4">
                            <h3 class="font-bold text-blue-300">{{ $settings['gm_title'] ?? 'SENIOR ADVISOR' }}</h3>
                            <p class="text-blue-100">
                                <span class="inline-block mr-2">📧:</span>
                                <a href="mailto:{{ $settings['gm_email'] ?? 'contact@example.com' }}" class="text-blue-300 hover:underline">
                                    {{ $settings['gm_email'] ?? 'contact@example.com' }}
                                </a>
                            </p>
                            <p class="text-blue-100">
                                <span class="inline-block mr-2">📱:</span>
                                {{ $settings['gm_phone'] ?? '+60 123 456 789' }}
                            </p>
                        </div>
                        
                        <!-- Company information -->
                        <div class="mb-4">
                            <h3 class="font-bold text-blue-300">{{ $settings['company_name'] ?? 'COMPANY NAME' }}</h3>
                            <p class="text-blue-100">
                                <span class="inline-block mr-2">📞:</span>
                                {{ $settings['company_phone'] ?? '+123 456 7890' }}
                                {{ !empty($settings['company_extension']) ? 'Ext:' . $settings['company_extension'] : '' }}
                            </p>
                            <p class="text-blue-100">
                                <span class="inline-block mr-2">🌐:</span>
                                <a href="{{ $settings['company_website'] ?? '#' }}" target="_blank" class="text-blue-300 hover:underline">
                                    {{ $settings['company_website_display'] ?? 'company-website.com' }}
                                </a>
                            </p>
                        </div>
                        
                        <!-- Location information with reduced spacing -->
                        <div class="space-y-2">
                            <div>
                                <h3 class="font-bold text-blue-300">{{ $settings['location1_name'] ?? 'Headquarters' }}:</h3>
                                <p class="text-blue-100 whitespace-pre-line">{{ $settings['location1_address'] ?? 'Company Address Line 1' }}</p>
                            </div>
                            
                            @if(!empty($settings['location2_name']))
                            <div>
                                <h3 class="font-bold text-blue-300">{{ $settings['location2_name'] }}:</h3>
                                <p class="text-blue-100 whitespace-pre-line">{{ $settings['location2_address'] }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <button id="know-about-me-btn" 
                            class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-full font-medium text-white shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
                        <span id="btn-text">Know About Me</span>
                        <svg id="btn-icon-down" xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <svg id="btn-icon-up" xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 hidden" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Company Section with Title Left, Video Right -->
<section id="about-company" class="py-16 bg-gradient-to-b from-white to-blue-50 w-full">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8 items-center">
            <!-- Left side - Just the Title -->
            <div class="w-full md:w-1/2 text-center">
                <h2 class="text-4xl font-bold text-blue-800">Company Profile</h2>
            </div>
            
            <!-- Right side - Video -->
            <div class="w-full md:w-1/2">
                <div class="aspect-w-16 aspect-h-9 rounded-xl overflow-hidden shadow-2xl border-2 border-blue-200">
                    <iframe id="about-company-video" 
                            src="{{ $settings['about_company_video'] ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}?origin={{ request()->getSchemeAndHttpHost() }}&enablejsapi=1" 
                            title="Company Profile" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen></iframe>
                </div>
                
                <!-- Fallback Content (Hidden by default) -->
                <div id="about-company-fallback" class="hidden mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-center">
                    <div class="text-red-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-gray-700 text-lg mb-4">Video cannot be displayed here.</p>
                    <a href="{{ preg_replace('/\/embed\//', '/watch?v=', $settings['about_company_video'] ?? 'https://www.youtube.com/watch?v=dQw4w9WgXcQ') }}" 
                    target="_blank" 
                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
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


<!-- Company Detail Section with Video Left, Title Right -->
<section id="company-detail" class="py-16 bg-gradient-to-b from-blue-50 to-white w-full">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8 items-center">
            <!-- Left side - Video -->
            <div class="w-full md:w-1/2 order-2 md:order-1">
                <div class="aspect-w-16 aspect-h-9 rounded-xl overflow-hidden shadow-2xl border-2 border-blue-200">
                    <iframe id="company-detail-video" 
                            src="{{ $settings['company_detail_video'] ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}?origin={{ request()->getSchemeAndHttpHost() }}&enablejsapi=1" 
                            title="ALMA Company Profile" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen></iframe>
                </div>
                
                <!-- Fallback Content (Hidden by default) -->
                <div id="company-detail-fallback" class="hidden mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-center">
                    <div class="text-red-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-gray-700 text-lg mb-4">Video cannot be displayed here.</p>
                    <a href="{{ preg_replace('/\/embed\//', '/watch?v=', $settings['company_detail_video'] ?? 'https://www.youtube.com/watch?v=dQw4w9WgXcQ') }}" 
                    target="_blank" 
                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                        </svg>
                        Watch on YouTube
                    </a>
                </div>
            </div>
            
            <!-- Right side - Just the Title -->
            <div class="w-full md:w-1/2 text-center order-1 md:order-2">
                <h2 class="text-4xl font-bold text-blue-800">ALMA Company Profile</h2>
            </div>
        </div>
    </div>
</section>


<!-- Portfolio Section - Improved layout with uniform sizing -->
<section id="portfolio" class="py-16 bg-gradient-to-b from-white to-blue-50 w-full">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-blue-800 text-center mb-12">Portfolio</h2>
        
        @forelse ($portfolios as $index => $portfolio)
            <div class="mb-16 last:mb-0" id="portfolio-{{ $portfolio->id }}">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <!-- Left side with centered title above logo box -->
                    <div class="w-full md:w-1/2 flex flex-col items-center">
                        <!-- Portfolio title centered above the logo box with spacing -->
                        <h3 class="text-2xl font-bold text-blue-600 mb-6">{{ $portfolio->title }}</h3>
                        
                        <!-- Logo box (smaller, centered) -->
                        <div class="bg-white rounded-xl p-6 shadow-xl border border-blue-100 flex justify-center items-center h-40 w-full max-w-sm">
                            @if($portfolio->logo_path)
                                <img src="{{ asset($portfolio->logo_path) }}" alt="{{ $portfolio->title }} Logo" class="max-h-24 max-w-full object-contain">
                            @else
                                <img src="{{ asset($settings['company_logo'] ?? 'images/default/logo.png') }}" alt="Company Logo" class="max-h-24 max-w-full object-contain">
                            @endif
                        </div>
                    </div>
                    
                    <!-- Right side - PDF Viewer with fixed height -->
                    <div class="w-full md:w-1/2 mt-8 md:mt-0">
                        <div class="rounded-xl overflow-hidden shadow-2xl border-2 border-blue-200 h-96">
                            <embed src="{{ asset($portfolio->pdf_path) }}" type="application/pdf" width="100%" height="100%" 
                                class="border-0">
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center p-8 bg-white rounded-xl shadow-xl max-w-2xl mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-600 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <p class="text-gray-600 text-lg">No portfolio items available yet.</p>
            </div>
        @endforelse
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-16 bg-gradient-to-b from-blue-50 to-white w-full">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-blue-800 text-center mb-12">Contact Me</h2>
        
        <div class="max-w-xl mx-auto">
            <form id="contact-form" class="bg-white p-8 rounded-xl shadow-xl border border-blue-100">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" id="name" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                </div>
                
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                </div>
                
                <div class="mb-6">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                    <textarea id="message" name="message" rows="6" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200"></textarea>
                </div>
                
                <div>
                    <button type="submit" 
                            class="w-full py-3 px-4 bg-blue-600 text-white font-medium rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
                        Send Message
                    </button>
                </div>
            </form>
            
            <!-- Success Message (initially hidden) -->
            <div id="contact-success" class="hidden mt-6 p-4 bg-green-100 text-green-700 rounded-lg shadow border border-green-200">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <p>Thank you for your message! I'll get back to you soon.</p>
                </div>
            </div>
            
            <!-- Error Message (initially hidden) -->
            <div id="contact-error" class="hidden mt-6 p-4 bg-red-100 text-red-700 rounded-lg shadow border border-red-200">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <p>There was an error sending your message. Please try again.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // About Me Button Functionality
        const aboutMeBtn = document.getElementById('know-about-me-btn');
        const gmBio = document.getElementById('gm-bio');
        const gmDetails = document.getElementById('gm-details');
        const btnText = document.getElementById('btn-text');
        const btnIconDown = document.getElementById('btn-icon-down');
        const btnIconUp = document.getElementById('btn-icon-up');
        
        if (aboutMeBtn && gmDetails) {
            aboutMeBtn.addEventListener('click', function() {
                // Toggle details
                gmDetails.classList.toggle('hidden');
                
                // Toggle bio only if it exists
                if (gmBio) {
                    gmBio.classList.toggle('hidden');
                }
                
                if (gmDetails && !gmDetails.classList.contains('hidden')) {
                    btnText.textContent = 'Hide About Me';
                    btnIconDown.classList.add('hidden');
                    btnIconUp.classList.remove('hidden');
                    
                    if (gmBio) {
                        gmBio.classList.add('animate-fadeIn');
                    }
                    gmDetails.classList.add('animate-fadeIn');
                } else {
                    btnText.textContent = 'Know About Me';
                    btnIconDown.classList.remove('hidden');
                    btnIconUp.classList.add('hidden');
                }
            });
        }
        
        // YouTube Video Error Handling with improved sizing
        function setupYouTubeErrorHandling(videoId, fallbackId) {
            const videoFrame = document.getElementById(videoId);
            const fallback = document.getElementById(fallbackId);
            
            if (videoFrame && fallback) {
                // Make sure video is responsive
                videoFrame.style.width = '100%';
                videoFrame.style.height = '100%';
                
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
        
        // Smooth scrolling for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                
                if (target) {
                    // Account for fixed header
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
        animation: fadeIn 0.4s ease-out forwards;
    }
</style>
@endsection