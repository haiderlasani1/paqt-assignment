<?php

namespace App\Modules\WmoSubsidy\App\Models;

use App\Modules\WmoSubsidy\Database\Factories\CallCenterFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallCenter extends Model
{
    /** @use HasFactory<CallCenterFactory> */
    use HasFactory;

    protected $fillable = ['name'];
}
