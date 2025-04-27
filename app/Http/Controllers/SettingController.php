<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'gm_name' => 'required|string|max:100',
            'gm_position' => 'required|string|max:100',
            'gm_bio' => 'nullable|string',
            'gm_title' => 'required|string|max:100',
            'gm_email' => 'required|email|max:100',
            'gm_phone' => 'required|string|max:30',
            'gm_image' => 'nullable|image|max:2048',
            'company_name' => 'required|string|max:100',
            'company_phone' => 'required|string|max:30',
            'company_extension' => 'nullable|string|max:30',
            'company_website' => 'required|url|max:255',
            'company_website_display' => 'required|string|max:100',
            'company_logo' => 'nullable|image|max:2048',
            'about_company_video' => 'required|string|max:255',
            'company_detail_video' => 'required|string|max:255',
            'contact_email' => 'required|email|max:100',
            'location1_name' => 'required|string|max:100',
            'location1_address' => 'required|string',
            'location2_name' => 'nullable|string|max:100',
            'location2_address' => 'nullable|string',
        ]);

        // Update text settings
        $textFields = [
            'gm_name', 'gm_position', 'gm_bio', 'gm_title', 'gm_email', 'gm_phone',
            'company_name', 'company_phone', 'company_extension', 'company_website', 'company_website_display',
            'contact_email', 
            'location1_name', 'location1_address', 'location2_name', 'location2_address'
        ];

        foreach ($textFields as $key) {
            if (isset($validated[$key])) {
                Setting::setValue($key, $validated[$key]);
            }
        }

        // Process YouTube URLs to ensure they're in embed format
        $aboutVideoUrl = $this->convertYoutubeUrl($validated['about_company_video']);
        $detailVideoUrl = $this->convertYoutubeUrl($validated['company_detail_video']);
        
        Setting::setValue('about_company_video', $aboutVideoUrl);
        Setting::setValue('company_detail_video', $detailVideoUrl);

        // Handle GM image upload
        if ($request->hasFile('gm_image')) {
            $old_gm_image = Setting::getValue('gm_image');
            if ($old_gm_image && str_starts_with($old_gm_image, 'storage/')) {
                $old_path = str_replace('storage/', 'public/', $old_gm_image);
                Storage::delete($old_path);
            }

            $gm_image_path = $request->file('gm_image')->store('public/images');
            Setting::setValue('gm_image', str_replace('public/', 'storage/', $gm_image_path));
        }

        // Handle company logo upload
        if ($request->hasFile('company_logo')) {
            $old_logo = Setting::getValue('company_logo');
            if ($old_logo && str_starts_with($old_logo, 'storage/')) {
                $old_path = str_replace('storage/', 'public/', $old_logo);
                Storage::delete($old_path);
            }

            $logo_path = $request->file('company_logo')->store('public/images');
            Setting::setValue('company_logo', str_replace('public/', 'storage/', $logo_path));
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully');
    }
    
    /**
     * Convert any YouTube URL format to embed format
     * 
     * @param string $url
     * @return string
     */
    private function convertYoutubeUrl($url)
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