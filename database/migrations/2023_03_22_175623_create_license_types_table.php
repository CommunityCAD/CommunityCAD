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
        Schema::create('license_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('perm_name');
            $table->string('prefix');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('license_types')->insert(['name' => 'Drivers License', 'perm_name' => 'dl_license', 'prefix' => 'DL']);
        DB::table('license_types')->insert(['name' => 'Commercial Drivers License', 'perm_name' => 'cdl_license', 'prefix' => 'CDL']);
        DB::table('license_types')->insert(['name' => 'CCW License', 'perm_name' => 'ccw_license', 'prefix' => 'CCW']);
        DB::table('license_types')->insert(['name' => 'Security License', 'perm_name' => 'security_license', 'prefix' => 'SC']);
        DB::table('license_types')->insert(['name' => 'Tow License', 'perm_name' => 'tow_license', 'prefix' => 'TW']);
        DB::table('license_types')->insert(['name' => 'Fishing License', 'perm_name' => 'fishing_license', 'prefix' => 'FSH']);
        DB::table('license_types')->insert(['name' => 'Hunting License', 'perm_name' => 'hunting_license', 'prefix' => 'HNT']);
        DB::table('license_types')->insert(['name' => 'Pilot License', 'perm_name' => 'pl_license', 'prefix' => 'PL']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license_types');
    }
};
