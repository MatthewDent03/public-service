<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::paginate(10);
        return view('user.reports.index')->with('reports', $reports);
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return view('user.reports.show')->with('report', $report);
    }

    public function create()
    {
        return view('user.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add any other validation rules here
        ]);

        $user = Auth::user();
        $report = new Report();
        $report->title = $request->title;
        $report->description = $request->description;
        // You can set other attributes as needed
        $report->user_id = $user->id; // Assuming you have a user_id column in your reports table
        $report->save();

        return redirect()->route('user.reports.index')->with('success', 'Report created successfully.');
    }
}
