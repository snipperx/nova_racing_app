<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualifyingSession;
use App\Services\DriverService;
use App\Services\QualifyingSessionService;
use App\Services\RaceService;
use App\Services\TeamService;
use Illuminate\Http\Request;

class QualifyingSessionController extends Controller
{
    private DriverService $driverService;
    private QualifyingSessionService $qualifyingSession;
    private RaceService $raceService;
    private TeamService $teamService;


    public function __construct(
        DriverService            $driverService,
        QualifyingSessionService $qualifyingSession,
        RaceService              $raceService,
        TeamService              $teamService,

    )
    {
        $this->driverService = $driverService;
        $this->qualifyingSession = $qualifyingSession;
        $this->raceService = $raceService;
        $this->teamService = $teamService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifyingSessions = $this->qualifyingSession->list();
        return view('qualifying_sessions.index', compact('qualifyingSessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = $this->teamService->listTeam();
        $drivers = $this->driverService->listDrivers();
        $races = $this->raceService->list();
        $qualifyingSessions = $this->qualifyingSession->list();
        return view('qualifying_sessions.create', compact('qualifyingSessions', 'teams', 'drivers', 'races'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateSession($request);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $this->qualifyingSession->store($request->all());
        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\QualifyingSession $qualifyingSession
     * @return \Illuminate\Http\Response
     */
    public function show(QualifyingSession $qualifyingSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\QualifyingSession $qualifyingSession
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = $this->teamService->listTeam();
        $drivers = $this->driverService->listDrivers();
        $races = $this->raceService->list();
        $qualifyingSessions = $this->qualifyingSession->find($id);
        return view('qualifying_sessions.edit', compact('qualifyingSessions', 'teams', 'drivers', 'races'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\QualifyingSession $qualifyingSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validateSession($request);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $this->qualifyingSession->update($id, $request->all());
        return response()->json(['message' => 'success'], 200);
    }


    public function destroy($qualifyingSession)
    {
        $qualifyingSession = $this->qualifyingSession->destroy($qualifyingSession);
        return redirect()->route('qualifying-sessions.index');
    }

    private
    function validateSession(Request $request)
    {
        return validator($request->all(), [
            'race_details_id' => 'required',
            'driver_id' => 'required',
            'team_id' => 'required',
            'qualifying_position' => 'required|numeric|min:0|max:100',
        ]);
    }
}
