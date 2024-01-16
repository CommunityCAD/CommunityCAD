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
        Schema::table('active_units', function (Blueprint $table) {
            $table->bigInteger('civilian_id')->unsigned()->nullable();
            $table->foreign('civilian_id')->references('id')->on('civilians');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('active_units', function (Blueprint $table) {
            //
        });
    }
};
