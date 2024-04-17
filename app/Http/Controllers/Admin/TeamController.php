<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Team;
use App\Services\EventService;
use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    private TeamService $teamService;
    private EventService $eventService;

    public function __construct(
        TeamService $teamService,
        EventService $eventService
    )
    {
        $this->teamService = $teamService;
        $this->eventService = $eventService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->teamService->listTeam();
        return view('team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = $this->eventService->list();
        return view('team.create', compact('events'));
    }


    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'event_id' => 'required',
            'nationality' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $event = $this->teamService->storeTeamDetails((array)$request->all());
        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $teams
     * @return \Illuminate\Http\Response
     */
    public function show(Team $teams)
    {
        //
    }


    public function edit($id)
    {
        $events = $this->eventService->list();
        $teams = $this->teamService->findTeam($id);
        return view('team.edit', compact('teams', 'events'));
    }


    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'event_id' => 'required',
            'nationality' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $this->teamService->updateTeamDetails($id, $request->all());
        return response()->json(['message' => 'success'], 200);
    }


    public function destroy($id)
    {
        $this->teamService->destroyTeam($id);
        return redirect()->route('teams.index');
    }
}
