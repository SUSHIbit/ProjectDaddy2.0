// Load the YouTube API script
function loadYouTubeAPI() {
    // Only load API if it's not already loaded
    if (!window.YT) {
        const tag = document.createElement("script");
        tag.src = "https://www.youtube.com/iframe_api";
        const firstScriptTag = document.getElementsByTagName("script")[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }
}

// YouTube Player objects
let aboutCompanyPlayer = null;
let companyDetailPlayer = null;

// This function will be called when the YouTube API is ready
window.onYouTubeIframeAPIReady = function () {
    console.log("YouTube API Ready");

    // Initialize About Company video player
    if (document.getElementById("about-company-video")) {
        aboutCompanyPlayer = new YT.Player("about-company-video", {
            events: {
                onError: onAboutCompanyPlayerError,
                onReady: onPlayerReady,
            },
        });
    }

    // Initialize Company Detail video player
    if (document.getElementById("company-detail-video")) {
        companyDetailPlayer = new YT.Player("company-detail-video", {
            events: {
                onError: onCompanyDetailPlayerError,
                onReady: onPlayerReady,
            },
        });
    }
};

// Player ready event handler
function onPlayerReady(event) {
    console.log("Player ready");
}

// Error handlers for each player
function onAboutCompanyPlayerError(event) {
    console.log("About Company video error:", event.data);
    showFallback("about-company-video", "about-company-fallback");
}

function onCompanyDetailPlayerError(event) {
    console.log("Company Detail video error:", event.data);
    showFallback("company-detail-video", "company-detail-fallback");
}

// Show fallback content when video can't be played
function showFallback(videoId, fallbackId) {
    const videoFrame = document.getElementById(videoId);
    const fallback = document.getElementById(fallbackId);

    if (videoFrame && fallback) {
        videoFrame.style.display = "none";
        fallback.classList.remove("hidden");
    }
}

// Load YouTube API when document is ready
document.addEventListener("DOMContentLoaded", function () {
    loadYouTubeAPI();
});
