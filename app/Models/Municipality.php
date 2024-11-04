<?php

namespace App\Models;

use Database\Factories\MunicipalityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Municipality extends Model
{
    /** @use HasFactory<MunicipalityFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function residents(): HasMany
    {
        return $this->hasMany(Resident::class);
    }

    public function callCenter(): HasOne
    {
        return $this->hasOne(CallCenter::class);
    }
}
