<?php

namespace App\Console\Commands;

use App\Book;
use App\Country;
use App\Phone;
use App\Photo;
use App\Post;
use App\Staff;
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
        $user = User::first();

        // hasOne
        echo $user->phone->number . PHP_EOL;

        // belongsTo
        $phone = Phone::where('user_id', $user->id)->first();
        echo $phone->user->name . PHP_EOL;
        echo $user->country->name . PHP_EOL;

        // belongsToMany
        foreach ($user->roles as $role) {
            echo $role->pivot->created_at . ':' . $role->name . PHP_EOL;
        }


        $post = Post::find(1);
        // hasMany
        foreach ($post->comments as $comment) {
            echo $comment->content . PHP_EOL;
        }

        // hasManyThrough
        foreach (Country::find(1)->posts as $post) {
            echo $post->title . PHP_EOL;
        }

        $staff = Staff::find(1);

        // Polymorphic Relations
        foreach ($staff->photos as $photo) {
            echo $photo->path . PHP_EOL;
        }

        $photo = Photo::find(1);

        $imageable = $photo->imageable;
        echo $imageable . PHP_EOL;
    }
}
