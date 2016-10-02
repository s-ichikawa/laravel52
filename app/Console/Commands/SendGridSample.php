<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
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

//        \Config::set('services.sendgrid.pretend', true);
        for ($i = 0; $i < 1; $i++) {
            $send_date = Carbon::today()->format('Y-m-d');
            $user = (object)['id' => 123];
            $res = \Mail::send('emails.sendgrid_sample', [], function (Message $message) use ($user, $send_date) {
                $message
                    ->subject('This is a test.')
                    ->from('ichikawa.shingo.0829@gmail.com')
                    ->to('ichikawa.shingo.0829@gmail.com')
                    ->attach(base_path('sample.pdf'))
                    ->embedData([
                        'categories'  => ['newsletter_1'],
                        'custom_args' => [
                            'send_date' => $send_date,
                            'user_id'   => (string)$user->id,
                        ],
                    ], 'sendgrid/x-smtpapi');
            });

            var_dump($res);
        }

        $bench->end();
        echo <<< EOM
|elapsed time | {$bench->getTime()}
|memory peak  | {$bench->getMemoryPeak()}
|memory usage | {$bench->getMemoryUsage()}

EOM;
    }
}
