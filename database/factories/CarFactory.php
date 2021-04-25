<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CarFactory extends Factory
{
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->word,
            'model' => $this->faker->word,
            'gov_number' => $this->faker->numberBetween(10, 10),
            'color' => $this->faker->colorName,
            'manufacture_year' => Carbon::now()->year,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => Carbon::now(),

            'driver_id' => function () {
                return Driver::factory()->create()->id;
            },
        ];
    }
}
