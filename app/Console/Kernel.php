<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        // exec method
        $host = config('database.connections.mysql.host');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $database = config('database.connections.mysql.database');
        $schedule->exec("touch /tmp/lar1.txt");
        $schedule->exec("mysqldump -h {$host} -u {$username} -p{$password} {$database}")
            ->daily()
            ->sendOutputTo('/var/www/laravel/backups/daily_backup.sql');
    }
}
