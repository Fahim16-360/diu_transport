<?php

namespace Database\Seeders;

use \App\Models\Route;
use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Route::factory(8)->create();
    }
}
