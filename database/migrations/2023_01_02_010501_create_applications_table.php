<?php

use App\Models\Department;
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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreignIdFor(Department::class);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->integer('status')->default(1);
            $table->text('why_join_department');
            $table->text('experience_department');
            $table->text('department_duties');
            $table->text('scenario');
            $table->text('about_you');
            $table->text('skills');
            $table->text('why_join_community');
            $table->boolean('legal_copy');
            $table->boolean('previous_member');

            $table->softDeletes();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE applications AUTO_INCREMENT = 3824;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
