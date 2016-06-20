<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Ubench;

class SendGridSample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendgrid:sample';

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
        $bench = new Ubench;
        $bench->start();

        for ($i = 1; $i < 5; $i++) {
            \Mail::send('emails.sendgrid_sample', [], function (Message $message) {
                $message
                    ->subject('This is a test.')
                    ->from('from@gmail.com')
                    ->to('test@example.com');
            });
        }

        $bench->end();
        echo <<< EOM
|elapsed time | {$bench->getTime()}
|memory peak  | {$bench->getMemoryPeak()}
|memory usage | {$bench->getMemoryUsage()}

EOM;
    }
}
