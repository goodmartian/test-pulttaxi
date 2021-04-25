<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\PricingPlan */
class PricingPlanResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'min_cost' => $this->min_cost,
            'cost_per_kilometer' => $this->cost_per_kilometer,
            'cost_per_minute' => $this->cost_per_minute,
            'free_kilometers_amount' => $this->free_kilometers_amount,
            'free_minutes_amount' => $this->free_minutes_amount,
            'cars' => CarResource::collection($this->whenLoaded('cars')),
        ];
    }
}
