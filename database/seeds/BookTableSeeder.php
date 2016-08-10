<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            ['name' => 'book_1', 'author_id' => 1, 'publisher_id' => 1, 'body' => 'body_1'],
            ['name' => 'book_2', 'author_id' => 1, 'publisher_id' => 2, 'body' => 'body_2'],
            ['name' => 'book_3', 'author_id' => 2, 'publisher_id' => 3, 'body' => 'body_3'],
            ['name' => 'book_4', 'author_id' => 2, 'publisher_id' => 1, 'body' => 'body_4'],
            ['name' => 'book_5', 'author_id' => 3, 'publisher_id' => 2, 'body' => 'body_5'],
            ['name' => 'book_6', 'author_id' => 3, 'publisher_id' => 3, 'body' => 'body_6'],
        ]);
    }
}
