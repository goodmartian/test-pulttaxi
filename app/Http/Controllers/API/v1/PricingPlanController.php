<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\PricingPlanRequest;
use App\Models\PricingPlan;
use App\Http\Resources\PricingPlanResource;
use App\Services\PricingPlanService;
use App\Http\Controllers\Controller;

class PricingPlanController extends Controller
{
    private PricingPlanService $pricingPlanService;

    public function __construct(PricingPlanService $pricingPlanRequest)
    {
        $this->pricingPlanService = $pricingPlanRequest;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $pricingPlans = PricingPlan::paginate(25);

        return PricingPlanResource::collection($pricingPlans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PricingPlanRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PricingPlanRequest $request)
    {
        try {
            $this->pricingPlanService->updateOrCreate($request);
        } catch (\DomainException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'message' => 'Тарифный план создан.'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return PricingPlanResource
     */
    public function show($id)
    {
        $pricingPlan = PricingPlan::findOrFail($id);

        return new PricingPlanResource($pricingPlan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PricingPlanRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PricingPlanRequest $request, $id)
    {
        try {
            $this->pricingPlanService->updateOrCreate($request, $id);
        } catch (\DomainException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'message' => 'Тарифный план обновлён.'
        ], 200);
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
        PricingPlan::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Тарифный план удалён.'
        ], 200);
    }
}
