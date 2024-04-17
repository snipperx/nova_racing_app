<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circuit;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{

    private $eventService;

    public function __construct(
        EventService $eventService
    )
    {
        $this->eventService = $eventService;
    }


    public function index()
    {
        $events = $this->eventService->list();
        return view('events.index', compact('events'));
    }


    public function create()
    {
        $circuits = Circuit::get();
        return view('events.create', compact('circuits'));
    }


    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'date' => 'required',
            'circuit_id' => 'required',
            'race_coordinator' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $this->mergeDateRequest($request);
        $event = $this->eventService->store((array)$request->all());
        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\event $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\event $event
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $circuits = Circuit::all();
        $event = $this->eventService->find($id);
        return view('events.edit', compact('event', 'circuits'));
    }

    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            'date' => 'required',
            'circuit_id' => 'required',
            'race_coordinator' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $this->mergeDateRequest($request);

        $this->eventService->update($id, $request->all());
        return response()->json(['message' => 'success'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->eventService->destroy($id);
        return redirect()->route('events.index');
    }

    private function mergeDateRequest($request)
    {
        $date = date('Y-m-d', strtotime($request['date']));
        return $request->merge(['date' => $date]);
    }

    private function mergeSlugRequest($request)
    {
        $slug = strtolower(implode('_',explode(' ',$request->name)));
        return $request->merge(['slug' => $slug]);
    }
}
