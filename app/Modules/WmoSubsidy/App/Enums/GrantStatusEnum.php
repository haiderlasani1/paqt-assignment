<?php

namespace App\Modules\WmoSubsidy\App\Enums;

use App\Helpers\EnumHelpers;

enum GrantStatusEnum: string
{
    use EnumHelpers;

    case ACTIVE = 'active';
    case TERMINATED = 'terminated';
}
