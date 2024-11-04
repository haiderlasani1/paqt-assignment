<?php

namespace Database\Factories;

use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Budget>
 */
class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $value = $this->faker->randomFloat(2, 0, 1000);

        return [
            'value' => $value,
            'remaining' => $value,
            'active_until' => Carbon::now()->addYear()->endOfYear()->toDateString(),
        ];
    }
}
