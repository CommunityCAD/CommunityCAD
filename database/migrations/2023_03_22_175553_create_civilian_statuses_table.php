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
        Schema::create('civilian_statuses', function (Blueprint $table) {
            $table->id();
            $table->text('status');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('civilian_statuses')->insert(['status' => 'Alive']);
        DB::table('civilian_statuses')->insert(['status' => 'Wanted']);
        DB::table('civilian_statuses')->insert(['status' => 'Jailed']);
        DB::table('civilian_statuses')->insert(['status' => 'Dead']);
        DB::table('civilian_statuses')->insert(['status' => 'Hospitalized']);
        DB::table('civilian_statuses')->insert(['status' => 'Pending Deleteion']);
        DB::table('civilian_statuses')->insert(['status' => 'Deleted']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('civilian_statuses');
    }
};
