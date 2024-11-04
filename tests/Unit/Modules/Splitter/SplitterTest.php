<?php

use App\Modules\Splitter\Splitter;

it('splits the list into sublists of the given length while preserving keys', function () {
    $splitter = new Splitter;
    $list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $length = 3;

    $result = $splitter->split($list, $length);

    expect($result)->toBeArray()
        ->and(count($result))->toBe(4)
        ->and($result[0])->toBe([1, 2, 3])
        ->and($result[1])->toBe([4, 5, 6])
        ->and($result[2])->toBe([7, 8, 9])
        ->and($result[3])->toBe([10]);
});

it('handles an empty list and returns an empty array', function () {
    $splitter = new Splitter;
    $list = [];
    $length = 3;

    $result = $splitter->split($list, $length);

    expect($result)->toBeArray()
        ->and($result)->toBeEmpty();
});

it('handles length greater than the list size', function () {
    $splitter = new Splitter;
    $list = [1, 2];
    $length = 5;

    $result = $splitter->split($list, $length);

    expect($result)->toBeArray()
        ->and(count($result))->toBe(1)
        ->and($result[0])->toBe([1, 2]);
});
