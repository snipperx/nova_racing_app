<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QualifyingSession extends Model
{
    use HasFactory , Uuids;

    protected $fillable = ['race_id', 'team_id', 'driver_id', 'qualifying_position','race_details_id'];

    /**
     * @return BelongsTo
     */
    public function raceDetails(): BelongsTo
    {
        return $this->belongsTo(RaceDetails::class);
    }

    /**
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * @return BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
