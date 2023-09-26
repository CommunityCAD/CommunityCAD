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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('civilian_id')->unsigned();
            $table->foreign('civilian_id')->references('id')->on('civilians');

            $table->boolean('showed_id')->default(0);

            $table->bigInteger('license_id')->unsigned()->nullable();
            $table->foreign('license_id')->references('id')->on('licenses');
            $table->timestamp('license_expire_at_stop')->nullable();
            $table->boolean('license_was_suspended')->default(0);

            $table->bigInteger('vehicle_id')->unsigned()->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->boolean('vehicle_was_impounded')->default(0);
            $table->timestamp('registration_expire_at_stop')->nullable();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('offense_occured_at');
            $table->string('location_of_offense');

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
        Schema::dropIfExists('tickets');
    }
};
