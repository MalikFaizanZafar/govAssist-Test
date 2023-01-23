<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Url;
use Illuminate\Support\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            // Finding records which were not updated in the last 30 days
            // Everytime a url is viewed, its 'updated_at' column is updated
            // As a result, links which were viewed in the last 30 days will have 'updated_at' column values of less than 30 days
            $urls = Url::where('updated_at', "<", Carbon::now()->subDay(30))->delete();
        })->daily(); // Running ths task daily
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
