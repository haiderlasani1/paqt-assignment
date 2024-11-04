<?php

namespace App\Models;

use Database\Factories\CallCenterFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CallCenter extends Model
{
    /** @use HasFactory<CallCenterFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }
}
