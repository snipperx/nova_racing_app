<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Results;
use App\Services\CircuitService;
use App\Services\DriverService;
use App\Services\EventService;
use App\Services\RaceService;
use App\Services\ResultsService;
use App\Services\TeamService;
use Illuminate\Http\Request;

class ResultsController extends Controller
{

    private RaceService $raceService;

    private TeamService $teamService;
    private DriverService $driverService;
    private ResultsService $resultsService;

    public function __construct(
        RaceService    $raceService,
        ResultsService $resultsService,
        TeamService    $teamService,
        DriverService  $driverService


    )
    {
        $this->raceService = $raceService;
        $this->resultsService = $resultsService;
        $this->driverService = $driverService;
        $this->teamService = $teamService;
    }

    public function index()
    {
        $results = $this->resultsService->listResults();
        return view('race_results.index', compact('results'));
    }

    public function create()
    {
        $race_details = $this->raceService->list();
        $drivers = $this->driverService->listDrivers();
        $teams = $this->teamService->listTeam();
        return view('race_results.create', compact('race_details', 'drivers', 'teams'));
    }

    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'race_details_id' => 'required|exists:race_details,id',
            'team_id' => 'required',
            'driver_id' => 'required|unique:results,driver_id',
            'podium_position' => 'required|unique:results,podium_position',
            'race_time' => 'required|date_format:H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $this->resultsService->create($request->all());
        return response()->json(['message' => 'success'], 200);
    }

    public function show($id)
    {
        $raceResult = Results::findOrFail($id);
        return view('race_results.show', compact('raceResult'));
    }

    public function edit($id)
    {
        $raceResult = $this->resultsService->getById($id);
//        dd($raceResult);
        $race_details = $this->raceService->list();
        $drivers = $this->driverService->listDrivers();
        $teams = $this->teamService->listTeam();
        return view('race_results.edit', compact('raceResult', 'race_details', 'drivers', 'teams'));
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'race_details_id' => 'required|exists:race_details,id',
            'team_id' => 'required|exists:teams,id',
            'driver_id' => 'required|exists:drivers,id',
            'podium_position' => 'required|integer',
            'race_time' => 'required|date_format:H:i:s',
        ]);

        // Find the race result record and update it
        $raceResult = Results::findOrFail($id);
        $raceResult->update($validatedData);

        return response()->json(['message' => 'success'], 200);
    }

    public function destroy($id)
    {
        // Find the race result record and delete it
        $raceResult = Results::findOrFail($id);
        $raceResult->delete();

        return redirect()->route('race-results.index')->with('success', 'Race result deleted successfully!');
    }
}
