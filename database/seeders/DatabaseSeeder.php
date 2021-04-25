<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;
use App\Models\PricingPlan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Driver::factory()
            ->count(5)
            ->hasCars(2)
            ->create();

        PricingPlan::factory()
            ->count(5)
            ->create();
    }
}
