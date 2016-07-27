<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            ['post_id' => 1, 'content' => 'content_1'],
            ['post_id' => 1, 'content' => 'content_2'],
            ['post_id' => 1, 'content' => 'content_3'],
        ]);
    }
}
