<?php

namespace App\Services;

use App\Models\QualifyingSession;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class QualifyingSessionService
{

    /**
     * @return Collection|Builder[]
     * cache frequent events
     */
    public function list(): array|Collection
    {
        return QualifyingSession::with('raceDetails', 'team', 'driver')->get();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function store($attributes)
    {
        return QualifyingSession::create($attributes);
    }

    /**
     * @param string $id
     * @return Builder|Model
     */
    public function find(string $id)
    {
        return QualifyingSession::with('raceDetails', 'team', 'driver')
            ->where('uuid', $id)
            ->firstOrFail();
    }


    public function update(int $id, $attributes)
    {
        $qualifying = QualifyingSession::find($id);
        return $qualifying->update($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $qualifying = QualifyingSession::findOrFail($id);
        return $qualifying->delete();
    }


}
