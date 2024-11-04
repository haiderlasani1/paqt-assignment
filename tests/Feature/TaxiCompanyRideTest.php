<?php

use App\Models\Municipality;
use App\Models\Parcel;
use App\Models\Resident;
use App\Models\Ride;
use App\Models\TaxiCompany;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('return all the rides for a taxi company', function () {
    // Given
    $municipality = Municipality::factory()->create();
    $parcel = Parcel::factory()->create([
        'municipality_id' => $municipality->id,
        'taxi_company_id' => TaxiCompany::factory()->create(),
    ]);
    $resident = Resident::factory()->create([
        'municipality_id' => $municipality->id,
        'parcel_id' => $parcel->id,
    ]);

    Ride::factory()->count(10)->create([
        'resident_id' => $resident->id,
        'destination' => 'An Address',
        'taxi_company_id' => $parcel->taxi_company_id,
        'distance' => 30,
    ]);

    // When
    $response = $this->getJson("api/v1/taxi-company/{$parcel->taxi_company_id}/rides");

    // Then
    $response->assertOk()->assertJsonCount(10, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'resident_id',
                    'destination',
                    'taxi_company_id',
                    'distance',
                ],
            ],
        ]);
});
