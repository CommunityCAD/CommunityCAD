<?php

use App\Models\LicenseType;
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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('civilian_id')->unsigned();
            $table->foreign('civilian_id')->references('id')->on('civilians')->onDelete('cascade');

            $table->foreignIdFor(LicenseType::class);
            $table->foreign('license_type_id')->references('id')->on('license_types')->onDelete('cascade');

            $table->date('expires_on');
            $table->integer('license_status')->default(1);
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
        Schema::dropIfExists('licenses');
    }
};
