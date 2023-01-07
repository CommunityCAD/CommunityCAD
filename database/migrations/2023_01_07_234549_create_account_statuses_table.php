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
        Schema::create('account_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('account_statuses')->insert(['name' => 'User']); // 1
        DB::table('account_statuses')->insert(['name' => 'Applicant']); // 2
        DB::table('account_statuses')->insert(['name' => 'Member']); // 3
        DB::table('account_statuses')->insert(['name' => 'Suspended/LOA']); // 4
        DB::table('account_statuses')->insert(['name' => 'Temporary Ban']); // 5
        DB::table('account_statuses')->insert(['name' => 'Permanent Ban']); // 6
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_statuses');
    }
};
