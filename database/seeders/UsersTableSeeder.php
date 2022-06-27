<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'name' => 'Fahim Abdul Aziz',
             'email' => 'fahim16-360@diu.edu.bd',
             'type' => 'Admin',
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test1@diu.edu.bd',
            'type' => 'User',
        ]);
    }
}
