<?php

namespace App\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;
use Maknz\Slack\Client as Slack;
use Maknz\Slack\Message;

class OlympicLive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'olympic:live';

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

        $client = new Client();
        $slack = new Slack(config('services.slack.channel'));
        $message = new Message($slack);

        $current_content = null;
        while (true) {
            $crawler = $client->request('GET', 'http://live.sportsnavi.yahoo.co.jp/rio2016/live/6386/');
            $nodes = $crawler->filter('div.paragraph')->getNode(0);


            $contents = explode(PHP_EOL, trim($nodes->textContent));

            if (isset($contents[0]) && $current_content == $contents[0]) {
                sleep(10);
                continue;
            }
            $current_content = $contents[0];

            $message->send($current_content);
        }
    }
}
