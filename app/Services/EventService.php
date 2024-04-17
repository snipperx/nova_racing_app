<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class EventService
{

    /**
     * @return Collection
     * cache frequent events
     */
    public function list(): Collection
    {
        return Event::with('circuit')->get();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function store(array $attributes): mixed
    {
        return Event::create($attributes);
    }

    /**
     * @param string $id
     * @return Builder|Model
     */
    public function find(string $id)
    {
        return Event::with('circuit')
            ->where('uuid', $id)
            ->firstOrFail();
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function update(int $id, array $attributes): bool
    {
        $event = Event::find($id);

        return $event->update($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        return $event->delete();
    }

}
