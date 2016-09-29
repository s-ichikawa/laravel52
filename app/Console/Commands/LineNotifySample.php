<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class LineNotifySample extends Command
{
    protected $signature = 'line:notify';

    public function handle()
    {
        $uri = 'https://notify-api.line.me/api/notify';
        $client = new Client();
        $client->post($uri, [
            'headers' => [
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer <Your Access Token>',
            ],
            'form_params' => [
                'message' => 'Hello, World!'
            ]
        ]);
    }
}
