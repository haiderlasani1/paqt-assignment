<?php

use App\Modules\DayInPeriod\MondayInWeek;
use Carbon\Carbon;

it('returns Mondays with week numbers of the year', function () {
    $dayInWeeks = new MondayInWeek(
        Carbon::create(2024, 12, 25),
        Carbon::create(2025, 1, 15)
    );

    $result = $dayInWeeks->get();

    expect($result)->toBeArray()
        ->and($result)->toBe([
            '1 week 2025' => '2024-12-30',
            '2 week 2025' => '2025-01-06',
        ]);
});

it('returns empty array if start date is greater then end date', function () {
    $dayInWeeks = new MondayInWeek(
        Carbon::create(2026, 12, 25),
        Carbon::create(2025, 1, 15)
    );

    $result = $dayInWeeks->get();

    expect($result)->toBeArray()->and($result)->toBe([]);
});
