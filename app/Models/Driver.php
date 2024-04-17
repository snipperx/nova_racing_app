<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Driver extends Model
{
    use HasFactory , Uuids;

    protected $fillable = ['team_id', 'name', 'date_of_birth', 'image'];

    /**
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
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

    /**
     * @return string
     */
    public function getAvatarAttribute(): string
    {
        if ($this->attributes['image']) {
            return asset('drivers/' . $this->attributes['image']);
        } else {
            return asset('img/drivers/default.png');
        }
    }


}
