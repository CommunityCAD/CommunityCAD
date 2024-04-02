<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared(file_get_contents('database/db_defaults/v1.1.0-sql.sql'));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
