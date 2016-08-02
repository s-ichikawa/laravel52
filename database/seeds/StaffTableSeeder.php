<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert([
            ['name' => 'Staff1'],
            ['name' => 'Staff2'],
            ['name' => 'Staff3'],
        ]);
    }
}
