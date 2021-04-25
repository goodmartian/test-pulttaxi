<?php

namespace App\Services;

use App\Models\Car;
use App\Http\Requests\CarRequest;

class CarService
{
    public function updateOrCreate(CarRequest $request, $id = null)
    {
        $car = Car::updateOrCreate([
            'id' => $id
        ], [
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'gov_number' => $request->input('gov_number'),
            'color' => $request->input('color'),
            'manufacture_year' => $request->input('manufacture_year'),
        ]);
    }

    public function assignPricingPlan($id, $pricingPlanId)
    {
        $car = Car::findOrFail($id);

        $car->pricingPlans()->attach($pricingPlanId);
    }
}
