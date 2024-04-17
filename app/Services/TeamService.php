<?php

namespace App\Services;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TeamService
{

    /**
     * @return Collection
     */
    public function listTeam(): Collection
    {
        return Team::with('event')->get();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function storeTeamDetails(array $attributes): mixed
    {
        return Team::create($attributes);
    }

    /**
     * @param string $id
     * @return Builder|Model
     */
    public function findTeam(string $id)
    {
        return Team::with('event')
            ->where('uuid', $id)
            ->firstOrFail();

    }

    /**
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function updateTeamDetails(int $id, array $attributes): bool
    {
        $event = Team::findOrFail($id);
        return $event->update($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyTeam($id): mixed
    {
        $event = Team::findOrFail($id);
        return $event->delete();
    }

}
