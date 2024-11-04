<?php


use App\Modules\Multipliable\MultipliableBuilder;
use App\Modules\Multipliable\MultipliableContract;

it('returns an array of MultipliableContract instances', function () {
    $builder = new MultipliableBuilder();
    $multipliables = $builder->fromStaticValues();

    expect($multipliables)->toBeArray()
        ->and($multipliables)->each->toBeInstanceOf(MultipliableContract::class)
        ->and($multipliables[0]->number())->toBe(3)
        ->and($multipliables[0]->value())->toBe('Fizz')
        ->and($multipliables[1]->number())->toBe(5)
        ->and($multipliables[1]->value())->toBe('Buzz');
});
