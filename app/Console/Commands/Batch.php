<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Batch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch {n}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '回分';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $n = $this->argument('n');

        $this->batch($n);
    }

    private function batch($n)
    {
        echo $n;
        if ($n == 0) {
            return;
        } elseif($n > 0) {
            $this->batch($n - 1);
        }
        echo $n;
    }
}
