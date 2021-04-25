<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use App\Http\Requests\DriverRequest;
use App\Services\DriverService;

class DriverController extends Controller
{
    private DriverService $driverService;

    public function __construct(DriverService $driverService)
    {
        $this->driverService = $driverService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $drivers = Driver::paginate(25);

        return DriverResource::collection($drivers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(DriverRequest $request)
    {
        try {
            $this->driverService->updateOrCreate($request);
        } catch (\DomainException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'message' => 'Водитель добавлен.'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return DriverResource
     */
    public function show($id)
    {
        $driver = Driver::findOrFail($id);

        return new DriverResource($driver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(DriverRequest $request, $id)
    {
        try {
            $this->driverService->updateOrCreate($request, $id);
        } catch (\DomainException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'message' => 'Данные водителя обновлены.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Driver::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Водитель удалён.'
        ], 200);
    }

    public function assignCar($id, $carId)
    {
        try {
            $this->driverService->assignCar($id, $carId);
        } catch (\DomainException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'message' => 'Машина успешно привязана к водителю.'
        ], 200);
    }
}
