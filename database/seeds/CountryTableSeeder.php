<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('countries')->truncate();
        DB::table('countries')->insert([
            ['name' => 'Japan'],
            ['name' => 'United States'],
            ['name' => 'France'],
        ]);
    }
}
