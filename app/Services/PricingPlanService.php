<?php

namespace App\Services;

use App\Http\Requests\PricingPlanRequest;
use App\Models\PricingPlan;

class PricingPlanService
{
    public function updateOrCreate(PricingPlanRequest $request, $id = null)
    {
        PricingPlan::updateOrCreate([
            'id' => $id
        ], [
            'name' => $request->input('name'),
            'min_cost' => $request->input('min_cost'),
            'cost_per_minute' => $request->input('cost_per_minute'),
            'cost_per_kilometer' => $request->input('cost_per_kilometer'),
            'free_minutes_amount' => $request->input('free_minutes_amount'),
            'free_kilometers_amount' => $request->input('free_kilometers_amount'),
        ]);
    }
}
