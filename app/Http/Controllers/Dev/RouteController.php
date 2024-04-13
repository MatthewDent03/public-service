<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\PrivateCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('dev');

        $routes = route::paginate(10);
        return view('dev.routes.index')->with('routes', $routes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('dev');

        $privateCompanies = PrivateCompany::all();
        return view('dev.routes.create', ['privateCompanies' => $privateCompanies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('dev');

        $request->validate([
            'start_location' => 'required',
            'end_location' => 'required',
            'estimated_departure' => 'required',
            'estimated_arrival' => 'required',
            'journey_route' => 'required', // Ensure incident_date is a valid date format
            'private_company_id' => 'required', // Add any additional validation rules as needed

        ]);
        
        

        // Log the request data
       // logger($request->all());

        // Create a new Doctor instance
        $route = route::create([
            'start_location' => $request->start_location,
            'end_location' => $request->end_location,
            'estimated_departure' => $request->estimated_departure,
            'estimated_arrival' => $request->estimated_arrival,
            'journey_route' => $request->journey_route,
            'private_company_id' => $request->private_company_id, // Assuming you have this value available
        ]);



    //     $route = new route();

    //   //  $route->fill($request->validate());
    //     $route->save();
        return redirect()->route('dev.routes.index');

        // return redirect()->route('dev.routes.index')->with('success', 'route created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(route $route)
    {
        return view('dev.routes.show')->with('route', $route);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(route $route)
    {
        return view('dev.routes.edit')->with('route', $route);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, route $route)
    {
        $user = Auth::user();
        $user->authorizeRoles('dev');
    
        $request->validate([
            'start_location' => 'required',
            'end_location' => 'required',
            'estimated_departure' => 'required',
            'estimated_arrival' => 'required',
            'journey_route' => 'required', // Ensure incident_date is a valid date format
        ]);
    
        $route->update([
            'start_location' => $request->start_location,
            'end_location' => $request->end_location,
            'estimated_departure' => $request->estimated_departure,
            'estimated_arrival' => $request->estimated_arrival,
            'journey_route' => $request->journey_route,
        ]);
    
        return redirect()->route('dev.routes.index')->with('success', 'route updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(route $route)
    {

        $route->delete();

        return redirect()->route('dev.routes.index')->with('success', 'route deleted successfully.');
    }
}
