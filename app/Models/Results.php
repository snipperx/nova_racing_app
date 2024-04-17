<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Results extends Model
{
    use HasFactory , Uuids;

    protected $fillable = ['race_id', 'team_id', 'driver_id','race_details_id', 'podium_position', 'race_time'];

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

    public function getAvatarAttribute(): string
    {
        if ($this->attributes['image']) {
            return asset('drivers/' . $this->attributes['image']);
        } else {
            return asset('img/drivers/default.png');
        }
    }
}
