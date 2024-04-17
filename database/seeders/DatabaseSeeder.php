<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserSeeder::class);
        $this->call(CircuitsTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(DriversTableSeeder::class);
    }
}
