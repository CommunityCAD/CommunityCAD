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
        Schema::create('user_accommodations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('receiver_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('giver_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->text('accommodation');
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
        Schema::dropIfExists('user_accommodations');
    }
};
