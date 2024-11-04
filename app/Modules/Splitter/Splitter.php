<?php

namespace App\Modules\Splitter;

readonly class Splitter
{
    public function split(array $list, int $length): array
    {
        return array_chunk(array: $list, length: $length);
    }
}
