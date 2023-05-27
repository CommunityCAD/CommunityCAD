<?php

use App\Models\Civilian;
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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate');
            $table->string('model');
            $table->string('color');
            $table->date('registration_expire');
            $table->foreignIdFor(Civilian::class);
            $table->foreign('civilian_id')->references('id')->on('civilians')->onDelete('cascade');
            $table->unsignedBigInteger('vehicle_status')->default(1);
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
        Schema::dropIfExists('vehicles');
    }
};
