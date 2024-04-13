<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Stop;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReportRequest;

use App\Http\Requests\UpdateReportRequest;
use App\Http\Controllers\UserController;

class StopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('dev');

        $stops = Stop::paginate(10);
        return view('dev.stops.index')->with('stops', $stops);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('dev');

        return view('dev.stops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('dev');

        $request->validate([
            'location_name' => 'required',
            'number' => 'required',
            'estimated_arrival_time' => 'required',
        ]);
        
        

        // Log the request data
       // logger($request->all());

        // Create a new Doctor instance
        $stop = Stop::create([
            'location_name' => $request->location_name,
            'number' => $request->number,
            'estimated_arrival_time' => $request->estimated_arrival_time,
        ]);



    //     $report = new Report();

    //   //  $report->fill($request->validate());
    //     $report->save();
        return redirect()->route('dev.stops.index');

        // return redirect()->route('dev.stops.index')->with('success', 'Report created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stop $stop)
    {
        return view('dev.stops.show')->with('stop', $stop);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stop $stop)
    {
        return view('dev.stops.edit')->with('stop', $stop);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stop $stop)
    {
        $user = Auth::user();
        $user->authorizeRoles('dev');
    
        $request->validate([
            'location_name' => 'required',
            'number' => 'required',
            'estimated_arrival_time' => 'required',
        ]);
    
        $stop->update([
            'location_name' => $request->location_name,
            'number' => $request->number,
            'estimated_arrival_time' => $request->estimated_arrival_time,
        ]);
    
        return redirect()->route('dev.stops.index')->with('success', 'Stop updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stop $stop)
    {
        $stop->delete();

        return redirect()->route('dev.stops.index')->with('success', 'Stop deleted successfully.');
    }
}
