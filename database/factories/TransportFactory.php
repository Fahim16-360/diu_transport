<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Helper;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transport>
 */
class TransportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $number = 1;

        $routes = Route::pluck('id')->toArray();
        $drivers = Driver::pluck('id')->toArray();
        $helpers = Helper::pluck('id')->toArray();

        return [
            'type' => $this->faker->randomElement([
                "Bus",
                "Mini-Bus",
                "Car"
            ]),
            'name' => $this->faker->randomElement([
                    'Padma',
                    'Meghna',
                    'Jamuna',
                    'Karnafuli',
                    'Shitalakkhaa',
                ]) . '-' . $number++,
            'license_number' => strtoupper($this->faker->bothify('??-####')),
            'route_id' => $this->faker->randomElement($routes),
            'driver_id' => $this->faker->randomElement($drivers),
            'helper_id' => $this->faker->randomElement($helpers),
        ];
    }
}
