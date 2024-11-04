<?php

use App\Models\Budget;
use App\Models\CallCenter;
use App\Models\Municipality;
use App\Models\Parcel;
use App\Models\Resident;
use App\Models\TaxiCompany;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('can book ride for a resident of municipality', function () {
    // Given
    $municipality = Municipality::factory()->create();
    $callCenter = CallCenter::factory()->create([
        'municipality_id' => $municipality->id,
    ]);
    $parcel = Parcel::factory()->create([
        'municipality_id' => $municipality->id,
        'taxi_company_id' => TaxiCompany::factory()->create(),
    ]);
    $resident = Resident::factory()->create([
        'municipality_id' => $municipality->id,
        'parcel_id' => $parcel->id,
    ]);
    Budget::factory()->create([
        'resident_id' => $resident->id,
        'value' => 100,
        'remaining' => 31,
    ]);

    // When
    $response = $this->postJson("api/v1/call-centers/{$callCenter->id}/rides", [
        'resident_id' => $resident->id,
        'destination' => 'An Address',
        'distance' => 30,
    ]);
    // Then
    $response->assertCreated()
        ->json([
            'resident_id' => $resident->id,
            'destination' => 'An Address',
            'taxi_company_id' => $parcel->taxi_company_id,
            'distance' => 30,
        ]);

    $this->assertDatabaseHas('rides', [
        'resident_id' => $resident->id,
        'destination' => 'An Address',
        'taxi_company_id' => $parcel->taxi_company_id,
        'distance' => 30,
    ]);

    $this->assertDatabaseHas('budgets', [
        'resident_id' => $resident->id,
        'remaining' => 1,
    ]);
});
