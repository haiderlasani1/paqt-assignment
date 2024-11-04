<?php

use App\Models\Budget;
use App\Models\Municipality;
use App\Models\Parcel;
use App\Models\Resident;
use App\Models\TaxiCompany;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('resets the remaining budget for expired budgets', function () {
    $municipality = Municipality::factory()->create();
    $parcel = Parcel::factory()->create([
        'municipality_id' => $municipality->id,
        'taxi_company_id' => TaxiCompany::factory()->create(),
    ]);
    $resident = Resident::factory()->create([
        'municipality_id' => $municipality->id,
        'parcel_id' => $parcel->id,
    ]);

    // Given
    Budget::factory()->create([
        'value' => 1000,
        'remaining' => 500,
        'active_until' => Carbon::now()->subDay(), // Expired budget
        'resident_id' => $resident->id,
    ]);

    Budget::factory()->create([
        'value' => 1500,
        'remaining' => 1000,
        'active_until' => Carbon::now()->addDay(), // Active budget
        'resident_id' => $resident->id,
    ]);

    // When
    Artisan::call('app:reset-resident-budget');

    // Then
    $this->assertDatabaseHas('budgets', [
        'value' => 1000,
        'remaining' => 1000,
    ]);

    $this->assertDatabaseHas('budgets', [
        'value' => 1500,
        'remaining' => 1000,
    ]);
});
