<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateGmBioSettingHandling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // If you want to start with an empty bio, update the existing record
        DB::table('settings')
            ->where('key', 'gm_bio')
            ->update(['value' => '']);
            
        // You might also need to update your application code to not display
        // the bio section when the value is empty
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Restore the original value if needed
        DB::table('settings')
            ->where('key', 'gm_bio')
            ->update(['value' => 'Experienced General Manager with over 15 years in the industry.']);
    }
}