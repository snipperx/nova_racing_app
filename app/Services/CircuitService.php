<?php

namespace App\Services;

use App\Models\Circuit;

class CircuitService
{
    public function getAllCircuits()
    {
        return Circuit::all();
    }

    public function getCircuitById($id)
    {
        return Circuit::where('uuid', $id)
            ->firstOrFail();

    }

    public function createCircuit($data)
    {
        return Circuit::create($data);
    }

    public function updateCircuitDetails($id, $attributes)
    {
        $circuit = Circuit::findOrFail($id);
        return $circuit->update($attributes);
    }


    public function destroyCircuit($id): mixed
    {
        $circuit = Circuit::findOrFail($id);
        return $circuit->delete();
    }
}
