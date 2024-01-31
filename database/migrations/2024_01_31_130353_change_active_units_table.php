<?php

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
        Schema::table('active_units', function (Blueprint $table) {
            $table->dropConstrainedForeignId('department_id');
            $table->dropConstrainedForeignId('civilian_id');
            $table->dropColumn('department_id');
            $table->dropColumn('badge_number');
            $table->dropColumn('agency');
            $table->dropColumn('calls');
            $table->dropColumn('deparrtment_type');
            $table->dropColumn('civilian_id');

            $table->integer('off_duty_type')->nullable();
            $table->timestamp('off_duty_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
