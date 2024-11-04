<?php

use App\Http\Controllers\API\V1\{
    CallCenterResidentsController,
};
use Illuminate\Support\Facades\Route;

Route::prefix('call-centers')->group(function () {
    Route::apiResource('/{callCenter}/residents', CallCenterResidentsController::class)
        ->only(['index']);
});
