<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventTableSeeder extends Seeder
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
            Event::create([
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'date' => $faker->date,
                'race_coordinator' => $faker->name,
                'is_active' => $faker->boolean,
                'circuit_id' => $faker->biasedNumberBetween(1,7),
            ]);
        }
    }
}
