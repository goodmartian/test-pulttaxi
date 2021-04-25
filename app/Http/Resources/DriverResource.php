<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Driver */
class DriverResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'full_name' => $this->fullName,
            'driver_license_series' => $this->driver_license_series,
            'driver_license_number' => $this->driver_license_number,
            'driver_license_validity_until' => $this->driver_license_validity_until,
        ];
    }
}
