<?php

namespace App\Modules\DayInPeriod;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Carbon\CarbonPeriod;

class MondayInWeek extends DayInWeeks
{
    public function __construct(Carbon $startDate, Carbon $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->startWeek = CarbonInterface::MONDAY;
        $this->endWeek = CarbonInterface::SUNDAY;
    }
}
