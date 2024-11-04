<?php

namespace App\Modules\DayInPeriod;

use Carbon\Carbon;

class DayInWeeks
{
    protected Carbon $startDate;
    protected Carbon $endDate;
    protected int $startWeek;
    protected int $endWeek;

    public function get(): array
    {
        if ($this->startDate->greaterThan($this->endDate)) {
            return []; // Can also be a custom exception
        }

        $startDate = $this->startDate->copy()->next($this->startWeek);
        $endDate = $this->endDate->copy()->previous($this->endWeek);

        $mondays = collect();
        while ($startDate->lessThanOrEqualTo($endDate)) {
            $weekNumber = $startDate->weekOfYear();
            $year = $startDate->yearIso;
            $mondays->put("{$weekNumber} week {$year}", $startDate->toDateString());
            $startDate->addWeek();
        }

        return $mondays->toArray();
    }
}
