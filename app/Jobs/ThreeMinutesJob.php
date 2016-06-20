<?php

namespace App\Jobs;

use App\Jobs\Job;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ThreeMinutesJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo Carbon::now()->format('Y-m-d H:i:s ') . getmypid() . ' start.' . PHP_EOL;

        sleep(120);

        echo Carbon::now()->format('Y-m-d H:i:s ') . getmypid() . ' end.' . PHP_EOL;
    }
}
