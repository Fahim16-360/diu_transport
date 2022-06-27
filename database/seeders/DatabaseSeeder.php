<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Create Admin and Test Users.
        $this->call(UsersTableSeeder::class);

        // Create Dummy Routes data.
        $this->call(RoutesTableSeeder::class);

        // Create Dummy Drivers data.
        $this->call(DriversTableSeeder::class);

        // Create Dummy Helpers data.
        $this->call(HelpersTableSeeder::class);

        // Create Dummy Transports data.
        $this->call(TransportsTableSeeder::class);

        // Create Dummy Logs data.
        $this->call(LogsTableSeeder::class);
    }
}
