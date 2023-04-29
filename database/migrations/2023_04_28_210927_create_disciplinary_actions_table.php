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
        Schema::create('disciplinary_actions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('receiver_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->bigInteger('giver_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->text('disciplinary_action');
            $table->bigInteger('disciplinary_action_type_id')->references('id')->on('disciplinary_action_types');

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
        Schema::dropIfExists('user_disciplinary_actions');
    }
};
