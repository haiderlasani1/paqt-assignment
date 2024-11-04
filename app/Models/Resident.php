<?php

namespace App\Models;

use Database\Factories\ResidentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Resident extends Model
{
    /** @use HasFactory<ResidentFactory> */
    use HasFactory;

    protected $fillable = ['name', 'address'];

    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }

    public function parcel(): BelongsTo
    {
        return $this->belongsTo(Parcel::class);
    }

    public function grant(): HasOne
    {
        return $this->hasOne(Grant::class);
    }

    public function rides(): HasMany
    {
        return $this->hasMany(Ride::class);
    }
}
