<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('cad_settings')->insert(['name' => 'allow_same_name_civilians', 'value' => 'false', 'type' => 'bool']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cad_setting', function (Blueprint $table) {
            //
        });
    }
};
