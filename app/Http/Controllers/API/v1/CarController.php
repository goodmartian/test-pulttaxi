<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Services\CarService;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{
    private CarService $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $cars = Car::paginate(25);

        return CarResource::collection($cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CarRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CarRequest $request)
    {
        try {
            $this->carService->updateOrCreate($request);
        } catch (\DomainException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'message' => 'Машина добавлена.'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return CarResource
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);

        return new CarResource($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CarRequest $request, $id)
    {
        try {
            $this->carService->updateOrCreate($request, $id);
        } catch (\DomainException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'message' => 'Данные машины успешно обновлены.'
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
        Car::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Машина успешно удалена.'
        ]);
    }

    public function assignPricingPlan($id, $pricingPlanId)
    {
        try {
            $this->carService->assignPricingPlan($id, $pricingPlanId);
        } catch (\DomainException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'message' => 'Тариф успешно привязан к машине.'
        ]);
    }
}
