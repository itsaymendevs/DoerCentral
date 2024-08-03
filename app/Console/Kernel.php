<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{





    // 1: defineSchedules
    protected function schedule(Schedule $schedule) : void
    {

        // 1: re-workQueue
        // $schedule->command('queue:work --stop-when-empty')->everyMinute()->withoutOverlapping();


    } // end function








    // ----------------------------------------------------------------------










    // 2: registerCommands
    protected function commands() : void
    {

        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');

    } // end function




} // end class
