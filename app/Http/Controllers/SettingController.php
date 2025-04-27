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
            'gm_bio' => 'required|string',
            'gm_image' => 'nullable|image|max:2048',
            'company_name' => 'required|string|max:100',
            'company_logo' => 'nullable|image|max:2048',
            'about_company_video' => 'required|string|max:255',
            'company_detail_video' => 'required|string|max:255',
            'contact_email' => 'required|email|max:100',
        ]);

        // Update text settings
        foreach (['gm_name', 'gm_position', 'gm_bio', 'company_name', 'about_company_video', 'company_detail_video', 'contact_email'] as $key) {
            Setting::setValue($key, $validated[$key]);
        }

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
}