<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('license_statuses', function (Blueprint $table) {
            $table->id();
            $table->text('status');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('license_statuses')->insert(['status' => 'Valid']);
        DB::table('license_statuses')->insert(['status' => 'Expired']);
        DB::table('license_statuses')->insert(['status' => 'Suspended']);
        DB::table('license_statuses')->insert(['status' => 'Revoked']);
        DB::table('license_statuses')->insert(['status' => 'Pending Approval']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license_statuses');
    }
};
