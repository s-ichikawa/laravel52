<?php

use Illuminate\Database\Seeder;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert([
            ['name' => 'publisher_1'],
            ['name' => 'publisher_2'],
            ['name' => 'publisher_3'],
        ]);
    }
}
