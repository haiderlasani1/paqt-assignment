<?php

namespace App\Modules\WmoSubsidy\App\Models;

use App\Modules\WmoSubsidy\Database\Factories\CallCenterFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CallCenter extends Model
{
    /** @use HasFactory<CallCenterFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function municipalities(): BelongsToMany
    {
        return $this->belongsToMany(Municipality::class);
    }
}
