<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Mail\Message;

class SendGridWithTemplate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendgrid:template';

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
        \Mail::raw('--embed body--', function (Message $message) {
            $message
                ->subject('--embed subject--')
                ->from('from@gmail.com')
                ->to('to@gmail.com')
                ->embedData([
                    'filters' => [
                        'templates' => [
                            'settings' => [
                                'enable' => 1,
                                'template_id' => 'your sendgrid template id.'
                            ]
                        ]
                    ],
                ], 'sendgrid/x-smtpapi');
        });
    }
}
