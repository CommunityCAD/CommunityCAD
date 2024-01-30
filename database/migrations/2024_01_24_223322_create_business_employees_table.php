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
        Schema::create('business_employees', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('business_id')->unsigned()->nullable();
            $table->foreign('business_id')->references('id')->on('businesses');

            $table->bigInteger('civilian_id')->unsigned()->nullable();
            $table->foreign('civilian_id')->references('id')->on('civilians');

            $table->integer('role')->default(1);

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
        Schema::dropIfExists('business_employees');
    }
};
