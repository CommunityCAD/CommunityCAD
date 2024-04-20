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
        Schema::create('bolos', function (Blueprint $table) {
            $table->id();
            $table->string('type');

            $table->bigInteger('civilian_id')->unsigned()->nullable();
            $table->foreign('civilian_id')->references('id')->on('civilians');

            $table->bigInteger('vehicle_id')->unsigned()->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');

            $table->bigInteger('call_id')->unsigned()->nullable();
            $table->foreign('call_id')->references('id')->on('calls');

            $table->text('last_location')->nullable();
            $table->text('last_appearance')->nullable();
            $table->text('last_transportation')->nullable();
            $table->text('wanted')->nullable();
            $table->text('warning')->nullable();
            $table->text('additional_information')->nullable();

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
        Schema::dropIfExists('bolo');
    }
};
