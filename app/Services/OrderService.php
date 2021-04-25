<?php

namespace App\Services;

use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Http;
use App\Models\PricingPlan;
use App\Models\Order;

class OrderService
{
    public function create(OrderRequest $request)
    {
        $pricingPlan = PricingPlan::findOrFail($request->input('pricing_plan_id'));

        $result = $this->calculateDistanceAndDuration(
            $pricingPlan,
            $request->input('coordinate_from'),
            $request->input('coordinate_to')
        );

        Order::create([
            'address_from' => $request->input('address_from'),
            'address_to' => $request->input('address_to'),
            'coordinate_from' => $request->input('coordinate_from'),
            'coordinate_to' => $request->input('coordinate_to'),
            'min_cost' => $pricingPlan->min_cost,
            'calculated_cost_by_kilometers' => $result['cost_by_kilometers'],
            'calculated_cost_by_minutes' => $result['cost_by_minutes'],
            'total_cost' => $result['total_cost'],
            'status' => Order::STATUS_NEW,
        ]);
    }

    private function calculateDistanceAndDuration($pricingPlan, $coordinate_from, $coordinate_to)
    {
        $result = Http::get(
            'http://router.project-osrm.org/route/v1/driving/'
                . $coordinate_from
                . ';' . $coordinate_to
            )->json();

        $costByMinutes = ($result['routes'][0]['duration'] / 60 - $pricingPlan->free_minutes_amount) * $pricingPlan->cost_per_minute;
        $costByKilometers = ($result['routes'][0]['distance'] / 1000 - $pricingPlan->free_kilometers_amount) * $pricingPlan->cost_per_kilometer;

        $totalCost = $pricingPlan->min_cost
            + $costByKilometers
            + $costByMinutes;

        $calculate = collect();

        $calculate->put('cost_by_kilometers', $costByKilometers);
        $calculate->put('cost_by_minutes', $costByMinutes);
        $calculate->put('total_cost', $totalCost);

        return $calculate;
    }
}
