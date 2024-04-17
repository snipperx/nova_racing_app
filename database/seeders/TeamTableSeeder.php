<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Team;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create events
        for ($i = 0; $i < 3; $i++) {
            Team::create([
                'name' => $faker->sentence,
                'nationality' => $faker->country(),
                'event_id' => $faker->biasedNumberBetween(1, 3),
            ]);
        }
    }
}
