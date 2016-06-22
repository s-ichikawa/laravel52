<?php

namespace App\Console\Commands;

use App\Event;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class EventSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:search';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'APIがあるサービスのイベント情報を取得するよ';

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
        $response = $client->get('http://connpass.com/api/v1/event/?count=100&ym=' . Carbon::now()->format('Ym'));

        $json = json_decode($response->getBody()->getContents());

        
//        foreach ((new Event)->all() as $event) {
//            $event->delete();
//        }
        foreach ($json->events as $event) {
            Event::query()->firstOrCreate([
                'event_id'    => $event->event_id,
                'title'       => $event->title,
                'catch'       => $event->catch,
                'description' => $event->description,
                'event_url'   => $event->event_url
            ]);
        }
    }


}
