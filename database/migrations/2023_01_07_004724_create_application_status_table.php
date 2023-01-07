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
        Schema::create('application_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('application_statuses')->insert(['name' => 'Pending Review']); // 1
        DB::table('application_statuses')->insert(['name' => 'Pending Admin Review']); // 2
        DB::table('application_statuses')->insert(['name' => 'Pending Interview']); // 3
        DB::table('application_statuses')->insert(['name' => 'Approved']); // 4
        DB::table('application_statuses')->insert(['name' => 'Declined']); // 5
        DB::table('application_statuses')->insert(['name' => 'Withdrown']); // 6

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_status');
    }
};
