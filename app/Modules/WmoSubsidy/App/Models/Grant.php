<?php

namespace App\Modules\WmoSubsidy\App\Models;

use App\Modules\WmoSubsidy\App\Enums\GrantStatusEnum;
use App\Modules\WmoSubsidy\Database\Factories\GrantFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    /** @use HasFactory<GrantFactory> */
    use HasFactory;

    protected $fillable = ['budget', 'remaining_budget', 'is_active'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean'
        ];
    }
}
