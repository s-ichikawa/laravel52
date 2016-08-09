<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            ['name' => 'author_1'],
            ['name' => 'author_2'],
            ['name' => 'author_3'],
        ]);
    }
}
