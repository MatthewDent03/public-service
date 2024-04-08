<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRouteRequest;
use App\Http\Requests\UpdateRouteRequest;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validated();
        $data['csv_file'] = $request->file('csv_file')->store('csv_files'); // Store uploaded CSV file
        Route::create($data);
        return redirect()->route('routes.index')->with('success', 'Route created successfully.');
    }

    public function update(Request $request, Route $route)
    {
        $data = $request->validated();
        if ($request->hasFile('csv_file')) {
            $data['csv_file'] = $request->file('csv_file')->store('csv_files'); // Update CSV file if provided
        }
        $route->update($data);
        return redirect()->route('routes.index')->with('success', 'Route updated successfully.');
    }
}
