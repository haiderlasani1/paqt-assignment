<?php

namespace App\Modules\WmoSubsidy\Database\Factories;

use App\Modules\WmoSubsidy\App\Models\CallCenter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CallCenter>
 */
class CallCenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
