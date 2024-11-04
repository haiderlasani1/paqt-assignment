<?php

namespace App\Rules;

use App\Models\Resident;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

readonly class MunicipalityResidentRule implements ValidationRule
{
    public function __construct(private int $municipalityId)
    {
        //
    }

    /**
     * Run the validation rule.
     *
     * @param Closure(string, ?string=): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exists = Resident::whereHas('municipality',
            fn($query) => $query->where('id', $this->municipalityId))
            ->where('id', $value)
            ->exists();

        if (!$exists) {
            $fail('The :attribute must be a municipality resident.');
        }
    }
}
