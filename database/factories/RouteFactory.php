<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $number = 1;

        $start = $this->faker->streetName();
        $end = $this->faker->streetName();

        $route_1 = join(' <> ', [
            $start,
            $this->faker->streetName(),
            $this->faker->streetName(),
            $this->faker->streetName(),
            $end,
        ]);

        $route_2 = join(' <> ', [
            $start,
            $this->faker->streetName(),
            $this->faker->streetName(),
            $this->faker->streetName(),
            $this->faker->streetName(),
            $this->faker->streetName(),
            $this->faker->streetName(),
            $end,
        ]);

        $route_3 = join(' <> ', [
            $start,
            $this->faker->streetName(),
            $this->faker->streetName(),
            $this->faker->streetName(),
            $this->faker->streetName(),
            $end,
        ]);

        return [
            "route_number" => 'R' . $number++,
            "name" => join(' <> ', [$start, $end]),
            "description" => $this->faker->randomElement([
                $route_1,
                $route_2,
                $route_3
            ]),
            "map_url" => $this->faker->url(),
        ];
    }
}
