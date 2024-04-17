<?php

namespace App\Services;

use App\Models\Driver;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class DriverService
{
    /**
     * @return Collection
     * cache frequent events
     */
    public function listDrivers(): Collection
    {
        return Driver::with('team')->get();
    }


    public function storeDrivers($attributes)
    {
        return Driver::create([
            'name' => $attributes['name'],
            'team_id' => $attributes['team_id'],
            'date_of_birth' => $attributes['date_of_birth'],
            'image' => $attributes['profile_pic'],

        ]);
    }


    public function findDriver(string $id)
    {
        return Driver::with('team')
            ->where('uuid', $id)
            ->firstOrFail();
    }


    public function updateDriver(int $id, $attributes)
    {
        $driver = Driver::find($id);

        return $driver->update(
            [
                'name' => $attributes['name'],
                'team_id' => $attributes['team_id'],
                'date_of_birth' => $attributes['date_of_birth'],
                'image' => $attributes['profile_pic'],

            ]
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyDriver($id)
    {
        $driver = Driver::findOrFail($id);
        return $driver->delete();
    }
}
