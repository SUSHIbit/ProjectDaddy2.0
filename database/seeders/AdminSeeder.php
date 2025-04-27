<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'ariefsushi1@gmail.com',
            'password' => Hash::make('123456789'),
        ]);

        // Create default settings
        $settings = [
            'gm_name' => 'John Doe',
            'gm_position' => 'General Manager',
            'gm_bio' => 'Experienced General Manager with over 15 years in the industry.',
            'gm_image' => 'images/default/gm.jpg',
            'company_name' => 'Acme Corporation',
            'company_logo' => 'images/default/logo.png',
            'about_company_video' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'company_detail_video' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'contact_email' => 'contact@example.com',
        ];

        foreach ($settings as $key => $value) {
            Setting::create([
                'key' => $key,
                'value' => $value
            ]);
        }
    }
}