<?php

use Illuminate\Database\Seeder;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('phones')->insert([
            ['user_id' => 1, 'number' => '090-1234-5678'],
            ['user_id' => 2, 'number' => '090-1234-9876'],
        ]);
    }
}
