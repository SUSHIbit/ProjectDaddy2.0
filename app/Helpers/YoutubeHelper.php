<?php

namespace App\Helpers;

class YouTubeHelper
{
    /**
     * Convert any YouTube URL format to embed format
     * 
     * @param string $url
     * @return string
     */
    public static function convertToEmbed($url)
    {
        // If it's already in embed format, return as is
        if (strpos($url, 'youtube.com/embed/') !== false) {
            return $url;
        }
        
        $videoId = null;
        
        // Extract video ID from various YouTube URL formats
        if (preg_match('/youtube\.com\/watch\?v=([^&\s]+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/youtu\.be\/([^&\s]+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/youtube\.com\/v\/([^&\s]+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/youtube\.com\/embed\/([^&\s]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
        
        // If video ID found, return embed URL, otherwise return the original URL
        if ($videoId) {
            return 'https://www.youtube.com/embed/' . $videoId;
        }
        
        return $url;
    }
}