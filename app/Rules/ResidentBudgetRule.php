<?php

namespace App\Rules;

use App\Models\Budget;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

readonly class ResidentBudgetRule implements ValidationRule
{
    public function __construct(private int $residentId) {}

    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exists = Budget::where('resident_id', $this->residentId)
            ->where('remaining', '>=', $value)
            ->exists();

        if (! $exists) {
            $fail('The :attribute limit is exceeded.');
        }
    }
}
