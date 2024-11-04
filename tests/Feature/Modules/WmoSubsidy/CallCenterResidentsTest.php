<?php


use App\Models\CallCenter;
use App\Models\Municipality;
use App\Models\Resident;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('return only the residents of available in a particular municipality', function () {
    // Given
    $municipality = Municipality::factory()->create();
    $callCenter = CallCenter::factory()->create([
        'municipality_id' => $municipality->id,
    ]);
    Resident::factory(2)->create([
        'municipality_id' => $municipality->id,
    ]);

    // When
    $response = $this->getJson("api/v1/call-centers/{$callCenter->id}/residents");

    // Then
    $response->assertStatus(200)->assertJsonCount(2, 'data');
});
