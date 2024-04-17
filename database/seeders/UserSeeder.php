<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'name' => 'Nkosana',
                'email' => 'gift@admin.co.za',
                'password' => Hash::make('tempassword!'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.co.za',
                'password' => Hash::make('adminpassword!'),
            ]

        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
}
