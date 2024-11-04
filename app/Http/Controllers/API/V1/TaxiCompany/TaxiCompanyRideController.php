<?php

namespace App\Http\Controllers\API\V1\TaxiCompany;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\RideResource;
use App\Models\Ride;
use App\Models\TaxiCompany;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaxiCompanyRideController extends Controller
{
    public function index(TaxiCompany $taxiCompany): AnonymousResourceCollection
    {
        $rides = Ride::where('taxi_company_id', $taxiCompany->id)->get();

        return RideResource::collection($rides);
    }
}
