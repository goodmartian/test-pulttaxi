<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Car */
class CarResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'brand' => $this->brand,
            'model' => $this->model,
            'gov_number' => $this->gov_number,
            'color' => $this->color,
            'manufacture_year' => $this->manufacture_year,
            'driver' => new DriverResource('driver'),
            'pricing_plans' => PricingPlanResource::collection($this->whenLoaded('pricingPlans')),
        ];
    }
}
