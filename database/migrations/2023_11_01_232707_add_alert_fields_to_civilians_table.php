<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('civilians', function (Blueprint $table) {
            $table->boolean('is_violent')->default(0);
            $table->boolean('is_weapon')->default(0);
            $table->boolean('is_ill')->default(0);
            $table->boolean('is_swat')->default(0);
            $table->boolean('is_ciu')->default(0);
            $table->boolean('is_warrant')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('civilians', function (Blueprint $table) {
            //
        });
    }
};
