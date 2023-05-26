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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->string('nature');
            $table->text('narrative');
            $table->string('location');
            $table->string('city');
            $table->integer('priority');
            $table->integer('type');
            $table->string('status');
            $table->bigInteger('lead_user_id')->nullable()->references('id')->on('users')->onDelete('cascade');

            $table->longText('units')->nullable();
            $table->longText('names')->nullable();

            $table->string('source');
            $table->unsignedBigInteger('rp_civilian_id')->nullable()->references('id')->on('civilians')->onDelete('cascade');

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
        Schema::dropIfExists('calls');
    }
};
