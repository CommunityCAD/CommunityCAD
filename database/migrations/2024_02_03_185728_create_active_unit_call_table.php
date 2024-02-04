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
        Schema::create('active_unit_call', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls');

            $table->bigInteger('active_unit_id')->unsigned();
            $table->foreign('active_unit_id')->references('id')->on('active_units');

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
        Schema::dropIfExists('active_unit_call');
    }
};
