<?php

namespace App\Http\Controllers\API\V1\CallCenter;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\CallCenter\Ride\CallCenterRideStoreRequest;
use App\Http\Resources\V1\RideResource;
use App\Models\CallCenter;
use App\Models\Resident;

class CallCenterRideController extends Controller
{
    public function store(CallCenterRideStoreRequest $request, CallCenter $callCenter)
    {
        $resident = Resident::with('parcel:id,taxi_company_id')->find($request->resident_id);

        $ride = $resident->rides()->create([
            'destination' => $request->destination,
            'taxi_company_id' => $resident->parcel->taxi_company_id,
            'distance' => $request->distance,
        ]);

        $resident->budget->remaining -= $request->distance;
        $resident->budget->save();

        return RideResource::make($ride);
    }
}
