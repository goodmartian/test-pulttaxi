<?php

namespace Database\Factories;

use App\Models\PricingPlan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PricingPlanFactory extends Factory
{
    protected $model = PricingPlan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'min_cost' => $this->faker->numberBetween(10, 100),
            'cost_per_kilometer' => $this->faker->randomNumber(2),
            'cost_per_minute' => $this->faker->randomNumber(2),
            'free_kilometers_amount' => $this->faker->randomNumber(1),
            'free_minutes_amount' => $this->faker->randomNumber(1),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
