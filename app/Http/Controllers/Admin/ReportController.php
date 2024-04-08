<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReportRequest;

use App\Http\Requests\UpdateReportRequest;
use App\Http\Controllers\UserController;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $reports = Report::paginate(10);
        return view('admin.reports.index')->with('reports', $reports);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'nearest_stop' => 'nullable',
            'city' => 'required',
            'incident_date' => 'required|date', // Ensure incident_date is a valid date format
        ]);
        
        

        // Log the request data
       // logger($request->all());

        // Create a new Doctor instance
        $report = Report::create([
            'title' => $request->title,
            'description' => $request->description,
            'nearest_stop' => $request->nearest_stop,
            'city' => $request->city,
            'incident_date' => $request->incident_date,
        ]);



    //     $report = new Report();

    //   //  $report->fill($request->validate());
    //     $report->save();
        return redirect()->route('admin.reports.index');

        // return redirect()->route('admin.reports.index')->with('success', 'Report created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return view('admin.reports.show')->with('report', $report);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        return view('admin.reports.edit')->with('report', $report);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        $report->fill($request->validated());
        $report->save();

        return redirect()->route('admin.reports.index')->with('success', 'Report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('admin.reports.index')->with('success', 'Report deleted successfully.');
    }
}
