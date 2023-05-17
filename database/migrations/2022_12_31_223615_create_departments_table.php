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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('initials');
            $table->boolean('is_open_external');
            $table->boolean('is_open_internal');

            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('departments')->insert(['name' => 'Blane County Sheriff\'s Office', 'is_open_external' => 1, 'is_open_internal' => 1]);
        DB::table('departments')->insert(['name' => 'Los Santos Police Department', 'is_open_external' => 1, 'is_open_internal' => 1]);
        DB::table('departments')->insert(['name' => 'San Andreas Highway Patrol', 'is_open_external' => 1, 'is_open_internal' => 1]);
        DB::table('departments')->insert(['name' => 'Civilian Operations', 'is_open_external' => 1, 'is_open_internal' => 1]);
        DB::table('departments')->insert(['name' => 'San Andreas Communications Department', 'is_open_external' => 1, 'is_open_internal' => 1]);
        DB::table('departments')->insert(['name' => 'San Andreas Fire Rescue', 'is_open_external' => 1, 'is_open_internal' => 1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
