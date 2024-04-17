<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory , Uuids;

    protected $fillable = ['date', 'circuit_id', 'race_coordinator', 'name', 'description','slug'];


    /**
     * @return HasMany
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     * @return HasOne
     */
    public function raceDetails(): HasOne
    {
        return $this->hasOne(RaceDetails::class);
    }

    /**
     * @return BelongsTo
     */
    public function circuit(): BelongsTo
    {
        return $this->belongsTo(Circuit::class);
    }
}
