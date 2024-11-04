<?php

namespace App\Modules\Multipliable;

readonly class Multipliable implements MultipliableContract
{

    public function __construct(private int $number, private string $value)
    {

    }

    public function number(): int
    {
        return $this->number;
    }

    public function value(): string
    {
        return $this->value;
    }
}
