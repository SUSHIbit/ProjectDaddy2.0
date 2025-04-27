<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Add new columns to the settings table
        Schema::table('settings', function (Blueprint $table) {
            // These operations are safe because we're just adding entries to the settings table
            // which stores key-value pairs
        });

        // Insert the new settings with default values
        $settings = [
            'gm_title' => 'SENIOR ADVISOR',
            'gm_email' => 'contact@example.com',
            'gm_phone' => '+60 123 456 789',
            'company_phone' => '+123 456 7890',
            'company_extension' => '2020',
            'company_website' => 'https://www.example.com',
            'company_website_display' => 'www.example.com',
            'location1_name' => 'Main Office',
            'location1_address' => 'Your office address line 1
Your office address line 2',
            'location2_name' => 'Branch Office',
            'location2_address' => 'Your branch address line 1
Your branch address line 2',
        ];

        foreach ($settings as $key => $value) {
            DB::table('settings')->insertOrIgnore([
                'key' => $key,
                'value' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        // Remove the settings entries
        DB::table('settings')->whereIn('key', [
            'gm_title', 'gm_email', 'gm_phone',
            'company_phone', 'company_extension', 'company_website', 'company_website_display',
            'location1_name', 'location1_address',
            'location2_name', 'location2_address',
        ])->delete();
    }
};