<?php

namespace App\Console;

use App\Console\Commands\Batch;
use App\Console\Commands\EloquentEagerSample;
use App\Console\Commands\EloquentInsertingRelatedModel;
use App\Console\Commands\EloquentSample;
use App\Console\Commands\EventSearch;
use App\Console\Commands\GuzzleAsync;
use App\Console\Commands\LineNotifySample;
use App\Console\Commands\OlympicLive;
use App\Console\Commands\QueueTest;
use App\Console\Commands\SendGridSample;
use App\Console\Commands\SendGridWithTemplate;
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
        // Commands\Inspire::class,
        QueueTest::class,
        SendGridSample::class,
        SendGridWithTemplate::class,
        EventSearch::class,
        Batch::class,
        GuzzleAsync::class,
        EloquentSample::class,
        EloquentEagerSample::class,
        EloquentInsertingRelatedModel::class,
        OlympicLive::class,
        LineNotifySample::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }
}
