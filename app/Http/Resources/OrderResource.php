<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Order */
class OrderResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'address_from' => $this->address_from,
            'address_to' => $this->address_to,
            'coordinate_from' => $this->coordinate_from,
            'coordinate_to' => $this->coordinate_to,
            'min_cost' => $this->min_cost,
            'calculated_cost_by_kilometers' => $this->calculated_cost_by_kilometers,
            'calculated_cost_by_minutes' => $this->calculated_cost_by_minutes,
            'total_cost' => $this->total_cost,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
