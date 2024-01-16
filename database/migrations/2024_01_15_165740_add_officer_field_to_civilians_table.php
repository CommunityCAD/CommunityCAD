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
            $table->boolean('is_officer')->default(0);

            $table->bigInteger('user_department_id')->unsigned()->nullable();
            $table->foreign('user_department_id')->references('id')->on('user_departments')->onDelete('cascade');
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
