<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MakeGmBioNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // For Laravel's settings table, we need to update the record directly
        // since it's using a key-value structure
        DB::table('settings')
            ->where('key', 'gm_bio')
            ->update([
                'value' => null
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Set back to empty string if needed
        DB::table('settings')
            ->where('key', 'gm_bio')
            ->update([
                'value' => ''
            ]);
    }
}