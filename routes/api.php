<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\DriverController;
use App\Http\Controllers\API\v1\CarController;
use App\Http\Controllers\API\v1\PricingPlanController;
use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\OrderController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('drivers', DriverController::class);
    Route::prefix('drivers')->group(function () {
        Route::put('{id}/cars/{car_id}/assign', [DriverController::class, 'assignCar']);
    });

    Route::apiResource('cars', CarController::class);
    Route::prefix('cars')->group(function () {
        Route::put('{id}/pricing-plans/{pricing-plan-id}/assign', [CarController::class, 'assignPricingPlan']);
    });

    Route::apiResource('pricing-plans', PricingPlanController::class);
});

Route::apiResource('orders', OrderController::class)->except('destroy');

Route::prefix('auth')->group(function() {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('token', [AuthController::class, 'token']);
});
