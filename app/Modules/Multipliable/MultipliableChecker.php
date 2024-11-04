<?php

namespace App\Modules\Multipliable;

readonly class MultipliableChecker
{
    /** @var $multipliables MultipliableContract[] */
    private array $multipliables;

    public function __construct(array $multipliable)
    {
        $this->multipliables = $multipliable;
    }

    public function byLimit(int $limit): array
    {
        $output = [];

        for ($i = 1; $i <= $limit; $i++) {
            $output[] = $this->output($i);
        }

        return $output;
    }

    private function output(int $number): array
    {
        $output = '';

        foreach ($this->multipliables as $multipliable) {
            if ($number % $multipliable->number() === 0) {
                $output .= $multipliable->value();
            }
        }

        return [$number, $output];
    }
}
