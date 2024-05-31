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
        Schema::table('tickets', function (Blueprint $table) {
            $table->integer('speed_zone')->default(0);
            $table->text('speed_clocked_mode')->nullable();

            $table->boolean('is_dui')->default(0);
            $table->boolean('is_drugs')->default(0);
            $table->text('dui_test_method')->nullable();
            $table->text('dui_test_result')->nullable();
            $table->text('dui_test_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            //
        });
    }
};
