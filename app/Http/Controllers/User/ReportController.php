<?php

namespace App\Http\Controllers\User;
//imports all controllers and models required that are extended throughout the code

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReportRequest;

use App\Http\Requests\UpdateReportRequest;
use App\Http\Controllers\UserController;
//assigns routes to specified create, read, update and destroy functionality, these contains authorisation for roles and routing to views of the controller views
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  //authorises the user to be allowed this functionality usage
        $user = Auth::user();
        $user->authorizeRoles('user');

        $reports = Report::paginate(10);  //paginates the report with pagination arrows and tabbing
        return view('user.reports.index')->with('reports', $reports);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        return view('user.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');
//validating the content inserted and submitted into the form fields
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'nearest_stop' => 'nullable',
            'city' => 'required',
            'incident_date' => 'required|date', // Ensure incident_date is a valid date format
        ]);
        
        

        // Log the request data
       // logger($request->all());

        // Create a new report instance
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
        return redirect()->route('user.reports.index');

        // return redirect()->route('admin.reports.index')->with('success', 'Report created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return view('user.reports.show')->with('report', $report);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        $report->fill($request->validated());
        $report->save();
        //deleting the table and rerouting the user to a view

        return redirect()->route('user.reports.index')->with('success', 'Report updated successfully.');
    }
}
