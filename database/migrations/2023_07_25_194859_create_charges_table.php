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
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_id')->unsigned()->nullable();
            $table->foreign('ticket_id')->references('id')->on('tickets');

            $table->bigInteger('penal_code_id')->unsigned()->nullable();
            $table->foreign('penal_code_id')->references('id')->on('penal_codes');

            $table->integer('fine')->default(0);
            $table->integer('bail')->default(0);
            $table->integer('in_game_jail_time')->default(0);
            $table->integer('cad_jail_time')->default(0);

            $table->text('description');

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
        Schema::dropIfExists('offenses');
    }
};
