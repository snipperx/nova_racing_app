<?php

namespace App\Http\Controllers;

use App\Services\CircuitService;
use App\Services\DriverService;
use App\Services\EventService;
use App\Services\ResultsService;
use App\Services\TeamService;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    private CircuitService $circuitService;
    private DriverService $driverService;
    private EventService $eventService;
    private ResultsService $resultsService;
    private TeamService $teamService;



    public function __construct(
        CircuitService $circuitService,
        DriverService $driverService,
        EventService $eventService,
        ResultsService $resultsService,
        TeamService $teamService,

    )
    {
        $this->circuitService = $circuitService;
        $this->driverService = $driverService;
        $this->eventService = $eventService;
        $this->resultsService = $resultsService;
        $this->teamService = $teamService;
    }

    public function index()
    {
        $drivers = $this->driverService->listDrivers();
        return view('public.index' , compact('drivers'));
    }


    public function last_results()
    {
        $results = $this->resultsService->listResults();
        return view('public.last_results',compact('results'));

    }


    public function teams()
    {
        $teams = $this->teamService->listTeam();
        return view('public.teams',compact('teams'));
    }

    public function list_of_circuits()
    {
        $circuits = $this->circuitService->getAllCircuits();
        return view('public.circuits', compact('circuits'));
    }

    public function upcoming_events()
    {
        $events = $this->eventService->list();
        return view('public.upcoming_events',compact('events'));
    }

    public function standings()
    {

    }
}
