<?php

namespace App\Console;


// use App\Console\Commands\GainAdjustment;

use App\Console\Commands\GainAdjustment;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected $commands = [
        GainAdjustment::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('user:gain-adjustment')->everyMinute();
        // $schedule->command('app:gain-adjustment')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
