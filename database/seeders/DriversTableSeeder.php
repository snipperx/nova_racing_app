<?php

namespace Database\Seeders;

use App\Models\Driver;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $drivers = [
            [
                'name' => 'hamilton',
                'team_id' => '1',
                'date_of_birth' => $faker->date,
                'image' => 'hamilton.png',
                'is_active' => true,
            ],
            [
                'name' => 'Kubica',
                'team_id' => '2',
                'date_of_birth' => $faker->date,
                'image' => 'kubica.png',
                'is_active' => true,
            ],
            [
                'name' => 'Kevin',
                'team_id' => '3',
                'date_of_birth' => $faker->date,
                'image' => 'kevin_magnussen.png',
                'is_active' => true,
            ],

        ];

        foreach ($drivers as $driver) {
            Driver::create($driver);
        }
    }
}
