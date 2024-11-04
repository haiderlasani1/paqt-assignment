<?php

namespace App\Models;

use Database\Factories\ParcelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parcel extends Model
{
    /** @use HasFactory<ParcelFactory> */
    use HasFactory;

    protected $fillable = ['name', 'taxi_company_id', 'municipality_id'];

    public function residents(): HasMany
    {
        return $this->hasMany(Resident::class);
    }

    public function taxiCompany(): BelongsTo
    {
        return $this->belongsTo(TaxiCompany::class);
    }
}
