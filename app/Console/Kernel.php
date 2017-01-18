<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\RuleVerify::class,
        Commands\RuleCreate::class,
        Commands\RuleUpdate::class,
        Commands\WhitelistCreate::class,
        Commands\WhitelistVerify::class
    ];

    /**
     * Define the applications command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
    	$schedule->command('rule:verify')->hourly();
    	$schedule->command('rule:update')->everyTenMinutes();
    	$schedule->command('whitelist:verify')->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
