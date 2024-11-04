<?php

namespace App\Modules\WmoSubsidy\App\Models;

use App\Modules\WmoSubsidy\Database\Factories\TaxiCompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxiCompany extends Model
{
    /** @use HasFactory<TaxiCompanyFactory> */
    use HasFactory;

    protected $fillable = ['name'];
}
