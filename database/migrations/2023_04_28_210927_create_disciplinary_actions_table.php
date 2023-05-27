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
            $table->foreignIdFor(User::class, 'receiver_id');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignIdFor(User::class, 'giver_id');
            $table->foreign('giver_id')->references('id')->on('users');

            $table->bigInteger('disciplinary_action_type_id');
            $table->foreign('disciplinary_action_type_id')->references('id')->on('disciplinary_action_types');

            $table->text('disciplinary_action');
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
        Schema::dropIfExists('user_disciplinary_actions');
    }
};
