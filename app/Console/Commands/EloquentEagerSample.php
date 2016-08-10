<?php

namespace App\Console\Commands;

use App\Book;
use Illuminate\Console\Command;

class EloquentEagerSample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eloquent:eager';

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
        \DB::enableQueryLog();

        // 通常のリレーション
        $books = Book::all();
        foreach ($books as $book) {
            echo $book->author->name . PHP_EOL;
        }

        var_dump(\DB::getQueryLog());

        \DB::flushQueryLog();

        // Eagerローディング
        $books = Book::with('author', 'publisher')->get();
        foreach ($books as $book) {
            echo $book->author->name . ':' . $book->publisher->name . PHP_EOL;
        }

        var_dump(\DB::getQueryLog());
    }
}
