<?php

namespace App\Http\Controllers;
//importing the controllers and models required for functionality
use Illuminate\Http\Request;
use App\Http\Requests\StorePrivateCompanyRequest;
use App\Http\Requests\UpdatePrivateCompanyRequest;
use App\Models\PrivateCompany;
use Illuminate\Support\Facades\Auth;
use App\Models\Route;

//creating functions that are used within the controller and views that have create, read, update and delete functionality. these contain role authentication to prevent users and admins from deleting, editing and creating companies
//but they can view them and interact with the buttons, while devs can create, read, update and delete the company tables.
class PrivateCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $privateCompanies = PrivateCompany::paginate(10); // You can adjust the number per page as needed
        // $privateCompanies = PrivateCompany::with('routes')->get();
        return view('private_companies.index', ['privateCompanies' => $privateCompanies]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('dev');
        return view('private_companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Check if user has dev role
        if ($user->hasRole('dev')) {
            // If dev, proceed with storing data
            //validating the inputted field values
            $request->validate([
                'company_name' => 'required',
                'company_email' => 'required',
                'company_number' => 'nullable',
            ]);
            //creating a table based off the inputted validated field values
            PrivateCompany::create([
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_number' => $request->company_number,
            ]);

            return redirect()->route('private_companies.index')->with('success', 'Private Company created successfully.');
        } else {
            // If not dev, redirect to index
            return redirect()->route('private_companies.index')->with('error', 'You do not have permission to create companies.');
        }
    }

    /**
     * Display the specified resource.
     */
    /**
 * Display the specified resource.
 */
public function show(PrivateCompany $privateCompany)
{
    return view('private_companies.show', compact('privateCompany'));
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(PrivateCompany $privateCompany)
{
    return view('private_companies.edit', compact('privateCompany'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, PrivateCompany $privateCompany)
    {
        $user = Auth::user();

        // Check if user has dev role
        if ($user->hasRole('dev')) {
            // If dev, proceed with updating data
            //validating the new field values that have been inputted
            $request->validate([
                'company_name' => 'required',
                'company_email' => 'required',
                'company_number' => 'required',
            ]);

            // Update the private company details
            //updating the form values based on the new field validated values
            $privateCompany->update([
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_number' => $request->company_number,
            ]);

            return redirect()->route('private_companies.index')->with('success', 'Private Company updated successfully.');
        } else {
            // If not dev, redirect to index
            return redirect()->route('private_companies.index')->with('error', 'You do not have permission to edit company details.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrivateCompany $privateCompany)
    {
        $user = Auth::user();

        // Check if user has dev role
        if ($user->hasRole('dev')) {
            // If dev, proceed with deleting data
            $privateCompany->delete();
            return redirect()->route('private_companies.index')->with('success', 'Private Company deleted successfully.');
        } else {
            // If not dev, redirect to index
            //deleting the table and rerouting the user to the views 
            return redirect()->route('private_companies.index')->with('error', 'You do not have permission to delete companies.');
    }
    }
}
