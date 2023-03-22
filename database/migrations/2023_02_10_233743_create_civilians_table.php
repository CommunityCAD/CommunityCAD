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
            $table->unsignedBigInteger('user_id');

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

            $table->softDeletes();
            $table->timestamps();
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
