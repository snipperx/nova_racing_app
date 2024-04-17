<?php

namespace Database\Seeders;

use App\Models\Circuit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CircuitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $circuits = [
            [
                'name' => 'Adelaide Street Circuit',
                'location' => 'Australia',
                'length' => 3.78,
                'lap_record' => '1:20:00',
                'is_active' => true,
            ],
            [
                'name' => 'Ain-Diab Circuit',
                'location' => 'Morocco',
                'length' => 7.6,
                'lap_record' => '1:08:00',
                'is_active' => true,
            ],
            [
                'name' => 'Aintree Motor Racing Circuit',
                'location' => 'United Kingdom',
                'length' => 4.82,
                'lap_record' => '1:03:00',
                'is_active' => true,
            ],
            [
                'name' => 'Algarve International Circuit',
                'location' => 'Portugal',
                'length' => 4.6,
                'lap_record' => '1:08:00',
                'is_active' => true,
            ],
            [
                'name' => 'Autódromo Internacional do Rio de Janeiro',
                'location' => 'Brazil',
                'length' => 5.031,
                'lap_record' => '1:01:00',
                'is_active' => true,
            ],
            [
                'name' => 'Autodromo Nazionale di Monza * ',
                'location' => 'Italy',
                'length' => 5.793 ,
                'lap_record' => '1:02:00',
                'is_active' => true,
            ],
            [
                'name' => 'AVUS',
                'location' => 'Germany',
                'length' => 8.33 ,
                'lap_record' => '1:23:00',
                'is_active' => true,
            ],

        ];

        foreach ($circuits as $circuit) {
            Circuit::create($circuit);
        }
    }
}
