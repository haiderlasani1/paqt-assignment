<?php

namespace App\Models;

use Database\Factories\BudgetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Budget extends Model
{
    /** @use HasFactory<BudgetFactory> */
    use HasFactory;

    protected $fillable = ['value', 'remaining', 'active_until', 'taxi_company_id'];

    public function resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class);
    }

    protected function casts(): array
    {
        return [
            'active_until' => 'date',
        ];
    }
}
