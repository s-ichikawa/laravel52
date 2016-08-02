<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CommentsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(PhonesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(StaffTableSeeder::class);
    }
}
