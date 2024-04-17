<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Services\DriverService;
use App\Services\TeamService;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    use FileUploadTrait;

    private $driverService;
    private TeamService $teamService;

    public function __construct
    (
        DriverService $driverService,
        TeamService   $teamService
    )
    {
        $this->driverService = $driverService;
        $this->teamService = $teamService;
    }


    public function index()
    {
        $drivers = $this->driverService->listDrivers();
        return view('drivers.index', compact('drivers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = $this->teamService->listTeam();
        return view('drivers.create', compact('teams'));
    }


    public function store(Request $request)
    {
        $validator =  $this->validateDriver($request);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $this->mergeBirthDayDateRequest($request);
        $this->uploadImage($request);
        $event = $this->driverService->storeDrivers($request);
        return response()->json(['message' => 'success'], 200);
    }


    public function show(Driver $driver)
    {
        //
    }


    public function edit($id)
    {
        $teams = $this->teamService->listTeam();
        $driver = $this->driverService->findDriver($id);

        return view('drivers.edit', compact('driver', 'teams'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'team_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $this->mergeBirthDayDateRequest($request);
        $this->uploadImage($request);
        $event = $this->driverService->updateDriver($id, $request);

        return redirect()->route('driver.index');
    }


    public function destroy($id)
    {
        $this->driverService->destroyDriver($id);
        return redirect()->route('driver.index');
    }

    private function mergeBirthDayDateRequest($request)
    {
        $date = date('Y-m-d', strtotime($request['date_of_birth']));
        return $request->merge(['date_of_birth' => $date]);
    }


    private function uploadImage($request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = public_path('drivers');
            $uploadedFilename = $this->uploadFile($file, $destinationPath);
            return $request->merge(['profile_pic' => $uploadedFilename]);
        }

    }

    /**
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\Validation\Validator
     */
    private function validateDriver(Request $request)
    {
        return validator($request->all(), [
            'name' => 'required',
            'date_of_birth' => 'required',
            'team_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    }
}
