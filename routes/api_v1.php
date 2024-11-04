<?php

use App\Http\Controllers\API\V1\CallCenter\CallCenterResidentsController;
use App\Http\Controllers\API\V1\CallCenter\CallCenterRideController;
use App\Http\Controllers\API\V1\TaxiCompany\TaxiCompanyRideController;
use Illuminate\Support\Facades\Route;

Route::prefix('call-centers')->group(function () {
    Route::apiResource('{callCenter}/residents', CallCenterResidentsController::class)
        ->only(['index']);
});

Route::prefix('call-centers')->group(function () {
    Route::prefix('{callCenter}')->group(function () {
        Route::apiResource('residents', CallCenterResidentsController::class)
            ->only(['index']);
        Route::apiResource('rides', CallCenterRideController::class)
            ->only(['store']);
    });
});

Route::prefix('taxi-company')->group(function () {
    Route::prefix('{taxiCompany}')->group(function () {
        Route::apiResource('rides', TaxiCompanyRideController::class)
            ->only(['index']);
    });
});
