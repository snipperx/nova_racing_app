<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Circuit extends Model
{
    use HasFactory,
        Uuids;

    protected $fillable = ['name', 'location', 'length', 'lap_record', 'image', 'slug'];

    /**
     * @return HasOne
     */
    public function raceDetails(): HasOne
    {
        return $this->hasOne(RaceDetails::class);
    }

    /**
     * @return HasMany
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
