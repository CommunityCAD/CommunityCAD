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
        Schema::create('civilians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name');
            $table->text('picture')->nullable();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('race');
            $table->integer('postal');
            $table->string('street');
            $table->string('city');
            $table->string('occupation')->nullable();
            $table->string('height');
            $table->string('weight');

            $table->integer('status')->default(1);
            $table->integer('active_persona')->default(0);

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
        Schema::dropIfExists('civilians');
    }
};
