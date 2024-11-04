<?php

namespace App\Http\Requests\API\V1\CallCenter\Ride;

use App\Rules\MunicipalityResidentRule;
use App\Rules\ResidentBudgetRule;
use Illuminate\Foundation\Http\FormRequest;

class CallCenterRideStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $callCenter = $this->route('callCenter');
        $residentId = $this->input('resident_id');

        return [
            'destination' => 'required|string|max:255',
            'distance' => ['required',
                'numeric',
                'min:1',
                new ResidentBudgetRule($residentId),
            ],
            'resident_id' => [
                'required',
                'integer',
                'exists:residents,id',
                new MunicipalityResidentRule($callCenter->municipality_id),
            ],
        ];
    }
}
