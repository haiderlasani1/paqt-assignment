<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ResidentResource;
use App\Models\Resident;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CallCenterResidentsController extends Controller
{
    public function index(int $callCenter): AnonymousResourceCollection
    {
        $resident = Resident::whereHas('municipality',
            fn($query) => $query->whereHas('callCenter',
                fn($query) => $query->where('id', $callCenter)))->paginate(15);

        return ResidentResource::collection($resident);
    }
}
