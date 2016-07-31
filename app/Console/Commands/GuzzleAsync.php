<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use Illuminate\Console\Command;
use Psr\Http\Message\ResponseInterface;

class GuzzleAsync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guzzle:async';

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
        $bench = new \Ubench();
        $bench->start();

        $client = new Client(['base_uri' => 'http://example.com/']);

        $promises = [
            $client->postAsync('/test')
                ->then(function (ResponseInterface $response) {
                    echo "OK\n";
                }, function (RequestException $e) {
                    echo $e->getMessage();
                }),
            $client->postAsync('/test')
                ->then(function (ResponseInterface $response) {
                    echo "OK\n";
                }, function (RequestException $e) {
                    echo $e->getMessage();
                }),
        ];

        $result = Promise\unwrap($promises);

        $bench->end();
        echo <<< EOM
|elapsed time | {$bench->getTime()}
|memory peak  | {$bench->getMemoryPeak()}
|memory usage | {$bench->getMemoryUsage()}

EOM;

    }
//
//    public function requests()
//    {
//        for ($i = 0; $i < 50; $i++) {
//            yield
//        }
//    }
}
