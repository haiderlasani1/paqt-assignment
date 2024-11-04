<?php

use App\Modules\Multipliable\MultipliableBuilder;
use App\Modules\Multipliable\MultipliableChecker;

it('generates the correct FizzBuzz output with number and value up to the given limit', function () {
    $builder = new MultipliableBuilder;
    $multipliables = $builder->fromStaticValues();
    $checker = new MultipliableChecker($multipliables);

    $result = $checker->byLimit(15);

    expect($result[2])->toBe([3, 'Fizz'])  // 3 is 'Fizz'
        ->and($result[4])->toBe([5, 'Buzz'])  // 5 is 'Buzz'
        ->and($result[14])->toBe([15, 'FizzBuzz'])  // 15 is 'FizzBuzz'
        ->and($result[0])->toBe([1, '']);  // 1 has no output
});

it('checks if the keys in the output are sorted in ascending order', function () {
    $builder = new MultipliableBuilder;
    $multipliables = $builder->fromStaticValues();
    $checker = new MultipliableChecker($multipliables);

    $result = $checker->byLimit(15);
    $keys = array_column($result, 0);

    $sortedKeys = $keys;
    sort($sortedKeys);

    expect($keys)->toEqual($sortedKeys);
});
