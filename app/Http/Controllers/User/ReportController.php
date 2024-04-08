<?php

namespace App\Http\Controllers\User;

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
        $user->authorizeRoles('user');

        $reports = Report::paginate(10);
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
    public function store(StoreReportRequest $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');
     

        // $request->validate([
        //     'title' => ['required', 'alpha'],
        //     'description' => ['required', 'alpha'],
       
        // ]);
        // Report::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
    
        // ]);
        $report = new Report();
        $report->fill($request->validated());
    
        $report->save();

        return redirect()->route('user.reports.index')->with('success', 'Report created successfully.');
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

        return redirect()->route('user.reports.index')->with('success', 'Report updated successfully.');
    }
}
