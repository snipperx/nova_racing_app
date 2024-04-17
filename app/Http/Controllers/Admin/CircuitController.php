<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circuit;
use App\Services\CircuitService;
use Illuminate\Http\Request;

class CircuitController extends Controller
{

    protected $circuitService;

    public function __construct(CircuitService $circuitService)
    {
        $this->circuitService = $circuitService;
    }

    public function index()
    {
        $circuits = $this->circuitService->getAllCircuits();
        return view('circuits.index', compact('circuits'));
    }

    public function show($id)
    {
        $circuit = $this->circuitService->getCircuitById($id);
        return view('circuits.show', compact('circuit'));
    }

    public function create()
    {
        return view('circuits.create');
    }

    public function store(Request $request)
    {

        $validator = $this->validateCircuit($request);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $this->circuitService->createCircuit($request->all());

        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Circuit $circuits
     * @return \Illuminate\Http\Response
     */
    public function edit( $circuits)
    {
        $circuit = $this->circuitService->getCircuitById($circuits);
        return view('circuits.edit', compact('circuit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Circuit $circuits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validateCircuit($request);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $this->circuitService->updateCircuitDetails($id, $request->all());

        return response()->json(['message' => 'success'], 200);

    }

    public function destroy($id)
    {
        $this->circuitService->destroyCircuit($id);
        return redirect()->route('circuit.index');
    }

    private function validateCircuit(Request $request)
    {
        return validator($request->all(), [
            'name' => 'required|string',
            'location' => 'required|string',
            'length' => 'required|numeric',
            'lap_record' => 'required',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    }
}
