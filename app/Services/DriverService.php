<?php

namespace App\Services;

use App\Models\Driver;
use App\Http\Requests\DriverRequest;
use App\Models\Car;

class DriverService
{
    public function updateOrCreate(DriverRequest $request, $id = null)
    {
        Driver::updateOrCreate([
            'id' => $id
        ], [
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'driver_license_number' => $request->input('driver_license_number'),
            'driver_license_series' => $request->input('driver_license_series'),
            'driver_license_validity_until' => $request->input('driver_license_validity_until'),
        ]);
    }

    public function assignCar($id, $carId)
    {
        $driver = Driver::findOrFail($id);

        $car = Car::findOrFail($carId);
        $car->driver()->associate($driver);
        $car->save();
    }
}
