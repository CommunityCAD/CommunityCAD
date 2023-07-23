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
        Schema::create('penal_codes', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('penal_code_title_id')->unsigned();
            $table->foreign('penal_code_title_id')->references('id')->on('penal_code_titles');

            $table->integer('number');
            $table->string('name');

            $table->text('section')->nullable();
            $table->text('notes')->nullable();

            $table->bigInteger('clasification')->unsigned();
            $table->foreign('penal_code_class_id')->references('id')->on('penal_code_classes');

            $table->integer('fine')->default(0);
            $table->integer('bail')->default(0);
            $table->integer('in_game_jail_time')->default(0);
            $table->integer('cad_jail_time')->default(0);

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
        Schema::dropIfExists('penal_codes');
    }
};
