<?php

use App\Http\Controllers\API\V1\{CallCenter\CallCenterResidentsController, CallCenter\CallCenterRideController};
use Illuminate\Support\Facades\Route;

Route::prefix('call-centers')->group(function () {
    Route::apiResource('/{callCenter}/residents', CallCenterResidentsController::class)
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
