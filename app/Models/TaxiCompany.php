<?php

namespace App\Models;

use Database\Factories\TaxiCompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaxiCompany extends Model
{
    /** @use HasFactory<TaxiCompanyFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function parcels(): HasMany
    {
        return $this->hasMany(Parcel::class);
    }

    public function rides(): HasMany
    {
        return $this->hasMany(Ride::class);
    }
}
