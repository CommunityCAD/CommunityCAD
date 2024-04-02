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
        Schema::create('discord_channels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('type');
            $table->bigInteger('channel_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::unprepared("
            INSERT INTO `discord_channels` (`name`, `description`, `type`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('cad_on_duty', NULL, 'cad', NULL, NULL, NULL, NULL);
            INSERT INTO `discord_channels` (`name`, `description`, `type`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('cad_off_duty', NULL, 'cad', NULL, NULL, NULL, NULL);
            INSERT INTO `discord_channels` (`name`, `description`, `type`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('cad_911_call', NULL, 'cad', NULL, NULL, NULL, NULL);
            INSERT INTO `discord_channels` (`name`, `description`, `type`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('application_new', NULL, 'application', NULL, NULL, NULL, NULL);
            INSERT INTO `discord_channels` (`name`, `description`, `type`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('application_approved', NULL, 'application', NULL, NULL, NULL, NULL);
            INSERT INTO `discord_channels` (`name`, `description`, `type`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('application_denied', NULL, 'application', NULL, NULL, NULL, NULL);
            INSERT INTO `discord_channels` (`name`, `description`, `type`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('interview_new', NULL, 'application', NULL, NULL, NULL, NULL);
            INSERT INTO `discord_channels` (`name`, `description`, `type`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('interview_approved', NULL, 'application', NULL, NULL, NULL, NULL);
            INSERT INTO `discord_channels` (`name`, `description`, `type`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('interview_denied', NULL, 'application', NULL, NULL, NULL, NULL);
            INSERT INTO `discord_channels` (`name`, `description`, `type`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('new_pending_user', NULL, 'application', NULL, NULL, NULL, NULL);
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discord_channels');
    }
};
