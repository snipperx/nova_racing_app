<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RaceDetails;
use App\Services\CircuitService;
use App\Services\EventService;
use App\Services\RaceService;
use Illuminate\Http\Request;

class RaceDetailsController extends Controller
{


    private RaceService $raceService;
    private EventService $eventService;
    private CircuitService $circuitService;

    public function __construct(
        RaceService    $raceService,
        EventService   $eventService,
        CircuitService $circuitService

    )
    {
        $this->raceService = $raceService;
        $this->eventService = $eventService;
        $this->circuitService = $circuitService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $races = $this->raceService->list();
        return view('race.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = $this->eventService->list();
        $circuits = $this->circuitService->getAllCircuits();
        return view('race.create', compact('circuits', 'events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateRaceDetails($request);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $event = $this->raceService->create($request->all());
        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\RaceDetails $raceDetails
     * @return \Illuminate\Http\Response
     */
    public function show(RaceDetails $raceDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\RaceDetails $raceDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = $this->eventService->list();
        $circuits = $this->circuitService->getAllCircuits();
        $raceDetails = $this->raceService->getById($id);
        return view('race.edit', compact('raceDetails', 'events', 'circuits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RaceDetails $raceDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validateRaceDetails($request);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $this->raceService->updateDetails($id, $request->all());
        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RaceDetails $raceDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($raceDetails)
    {
        $this->raceService->destroy($raceDetails);
        return redirect()->route('race.index');
    }

    private function validateRaceDetails(Request $request)
    {
        return validator($request->all(), [
            'number_of_laps' => 'required',
            'total_race_time' => 'required|date_format:H:i:s',
            'event_id' => 'required',
            'circuit_id' => 'required',
            'weather' => 'required',
        ]);
    }
}
