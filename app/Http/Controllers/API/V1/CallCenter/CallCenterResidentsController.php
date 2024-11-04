<?php

namespace App\Http\Controllers\API\V1\CallCenter;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ResidentResource;
use App\Models\CallCenter;
use App\Models\Resident;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CallCenterResidentsController extends Controller
{
    public function index(CallCenter $callCenter): AnonymousResourceCollection
    {
        // NOTE: Should check Permissions of the user using Policies

        // NOTE: This could be a repository injected in the constructor
        $resident = Resident::whereHas('municipality',
            fn ($query) => $query->whereHas('callCenter',
                fn ($query) => $query->where('id', $callCenter->id)))->paginate(15);

        // NOTE: Response can be more specific on application level
        return ResidentResource::collection($resident);
    }
}
