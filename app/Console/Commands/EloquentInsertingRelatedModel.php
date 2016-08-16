<?php

namespace App\Console\Commands;

use App\Book;
use App\Comment;
use App\Country;
use App\Phone;
use App\Photo;
use App\Post;
use App\Staff;
use App\User;
use Illuminate\Console\Command;

class EloquentInsertingRelatedModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eloquent:inserting_related_model';

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
        $comment = new Comment(['content' => 'a new content']);

        $post = Post::find(1);

        $post->comments()->save($comment);
    }
}
