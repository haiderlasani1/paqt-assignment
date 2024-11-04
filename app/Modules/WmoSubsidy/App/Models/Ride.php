<?php

namespace App\Modules\WmoSubsidy\App\Models;

use App\Modules\WmoSubsidy\Database\Factories\RideFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    /** @use HasFactory<RideFactory> */
    use HasFactory;

    protected $fillable = ['destination', 'taxi_company_id', 'resident_id', 'distance'];
}
