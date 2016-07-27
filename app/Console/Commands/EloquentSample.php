<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class EloquentSample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eloquent:sample';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $user = User::find(1);
        echo $user->phone->number . PHP_EOL;
        echo $user->country->name . PHP_EOL;
    }
}
