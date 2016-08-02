<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            ['path' => '/path/to/staff/image/1', 'imageable_id' => 1, 'imageable_type' => 'staff'],
            ['path' => '/path/to/staff/image/2', 'imageable_id' => 2, 'imageable_type' => 'staff'],
            ['path' => '/path/to/staff/image/3', 'imageable_id' => 3, 'imageable_type' => 'staff'],
            ['path' => '/path/to/prod/image/1', 'imageable_id' => 1, 'imageable_type' => 'prod'],
            ['path' => '/path/to/prod/image/2', 'imageable_id' => 2, 'imageable_type' => 'prod'],
            ['path' => '/path/to/prod/image/3', 'imageable_id' => 2, 'imageable_type' => 'prod'],
        ]);
    }
}
