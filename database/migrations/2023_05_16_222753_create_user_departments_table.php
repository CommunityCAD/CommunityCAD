<?php

use App\Models\Department;
use App\Models\User;
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
        Schema::create('user_departments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->string('badge_number')->nullable();
            $table->string('rank')->nullable();
            $table->integer('rank_id')->nullable();

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
        Schema::dropIfExists('user_departments');
    }
};
