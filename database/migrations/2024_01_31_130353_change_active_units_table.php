<?php

use App\Models\Department;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('active_units');

        Schema::create('active_units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('user_department_id')->unsigned();
            $table->foreign('user_department_id')->references('id')->on('user_departments');

            $table->bigInteger('officer_id')->unsigned()->nullable();
            $table->foreign('officer_id')->references('id')->on('officers');

            $table->string('subdivision')->nullable();

            $table->bigInteger('group_callsign_id')->nullable()->unsigned();

            $table->text('description')->nullable();
            $table->text('location')->nullable();
            $table->text('status')->nullable();


            $table->timestamp('first_on_duty_at')->nullable();
            $table->timestamp('off_duty_at')->nullable();
            $table->integer('off_duty_type')->nullable();
            $table->boolean('is_panic')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('active_units');
    }
};
