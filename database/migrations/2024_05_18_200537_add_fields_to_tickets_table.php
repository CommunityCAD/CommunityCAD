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
            $table->dateTime('court_at')->nullable();
            $table->string('court_location')->nullable();
            $table->string('courtroom')->nullable();

            $table->text('officer_comments')->nullable();

            $table->string('area')->nullable();
            $table->string('weather')->nullable();
            $table->string('traffic')->nullable();
            $table->boolean('accident')->default(0)->nullable();
            $table->string('speed')->nullable();
            $table->string('highway_street')->nullable();
            $table->boolean('is_injury')->default(0)->nullable();
            $table->boolean('is_passenger_under_16')->default(0)->nullable();
            $table->string('in_city_of')->nullable();
            $table->string('at_intersection')->nullable();
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
