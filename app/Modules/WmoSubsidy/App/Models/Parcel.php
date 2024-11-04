<?php

namespace App\Modules\WmoSubsidy\App\Models;

use App\Modules\WmoSubsidy\Database\Factories\ParcelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    /** @use HasFactory<ParcelFactory> */
    use HasFactory;

    protected $fillable = ['name', 'taxi_company_id', 'municipality_id'];
}
