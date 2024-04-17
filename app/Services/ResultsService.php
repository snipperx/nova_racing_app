<?php

namespace App\Services;

use App\Models\Results;

class ResultsService
{


    public function listResults()
    {
        return Results::with('raceDetails', 'team', 'driver')->get();
    }

    public function getById($id)
    {
        return Results::with('raceDetails', 'team', 'driver')
            ->where('uuid', $id)
            ->firstOrFail();
    }

    public function create($data)
    {
        return Results::create($data);
    }

    public function updateDetails(int $id, $attributes)
    {
        $results = Results::findOrFail($id);
        return $results->update($attributes);
    }


    public function destroy($id): mixed
    {
        $results = Results::findOrFail($id);
        return $results->delete();
    }

}
