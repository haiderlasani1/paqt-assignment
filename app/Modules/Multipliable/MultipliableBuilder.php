<?php

namespace App\Modules\Multipliable;

readonly class MultipliableBuilder
{
    /**
     * @return MultipliableContract[]
     */
    public function fromStaticValues(): array
    {
        $data = [
            3 => 'Fizz',
            5 => 'Buzz',
        ];

        $multiplyables = [];

        foreach ($data as $number => $value) {
            $multiplyables[] = new Multipliable(number: $number, value: $value);
        }

        return $multiplyables;
    }
}
