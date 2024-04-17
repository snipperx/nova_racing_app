<?php

namespace App\Services;

use App\Models\RaceDetails;

class RaceService
{
    public function list()
    {
        return RaceDetails::with('event', 'circuit')->get();
    }

    public function getById($id)
    {
        return RaceDetails::with('event', 'circuit')
            ->where('uuid', $id)
            ->firstOrFail();
    }

    public function create($data)
    {
        return RaceDetails::create($data);
    }

    public function updateDetails(int $id, $attributes)
    {
        $race_details = RaceDetails::findOrFail($id);
        return $race_details->update($attributes);
    }


    public function destroy($id): mixed
    {
        $race_details = RaceDetails::findOrFail($id);
        return $race_details->delete();
    }
}
