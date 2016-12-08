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
        $this->call(JopsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BSTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(CompanyDatasSeeder::class);
    }
}
