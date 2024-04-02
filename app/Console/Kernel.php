<?php

namespace App\Console;

use App\Models\Cad\ActiveUnit;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $active_units = ActiveUnit::where('updated_at', '<', Carbon::now()->subHours(4))->without(['officer', 'user_department', 'calls'])->get();
            foreach ($active_units as $active_unit) {
                if ($active_unit->updated_at < Carbon::now()->subHours(4)) {
                    $active_unit->update(['off_duty_type' => 3]);
                    $active_unit->delete();
                }
            }
        })->everyThirtyMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
