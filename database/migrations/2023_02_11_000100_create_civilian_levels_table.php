<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civilian_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('civilian_limit');
            $table->integer('firearm_limit');
            $table->integer('vehicle_limit');
            $table->json('license_types_allowed')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('civilian_levels');
    }
};
