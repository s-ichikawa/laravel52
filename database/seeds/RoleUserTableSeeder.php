<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamps = ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        DB::table('role_user')->insert([
            ['user_id' => 1, 'role_id' => 1] + $timestamps,
            ['user_id' => 1, 'role_id' => 2] + $timestamps,
            ['user_id' => 2, 'role_id' => 3] + $timestamps,
            ['user_id' => 3, 'role_id' => 1] + $timestamps,
            ['user_id' => 3, 'role_id' => 4] + $timestamps,
        ]);
    }
}
