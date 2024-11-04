<?php

use App\Modules\Multipliable\Multipliable;
use App\Modules\Multipliable\MultipliableContract;

it('implements the MultipliableContract and returns correct number and value', function () {
    $multipliable = new Multipliable(3, 'Fizz');

    expect($multipliable)->toBeInstanceOf(MultipliableContract::class)
        ->and($multipliable->number())->toBe(3)
        ->and($multipliable->value())->toBe('Fizz');
});
