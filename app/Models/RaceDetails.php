<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RaceDetails extends Model
{
    use HasFactory ,  Uuids;


    protected $fillable = ['event_id', 'circuit_id', 'number_of_laps', 'total_race_time', 'weather','name'];

    /**
     * @return BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * @return BelongsTo
     */
    public function circuit(): BelongsTo
    {
        return $this->belongsTo(Circuit::class);
    }

    /**
     * @return HasMany
     */
    public function results(): HasMany
    {
        return $this->hasMany(Results::class);
    }

    /**
     * @return HasMany
     */
    public function qualifyingSessions(): HasMany
    {
        return $this->hasMany(QualifyingSession::class);
    }
}
