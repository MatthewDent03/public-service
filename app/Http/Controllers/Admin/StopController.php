<?php

namespace App\Http\Controllers\Admin;
//imports all controllers and models required that are extended throughout the code

use App\Http\Controllers\Controller;
use App\Models\Stop;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
//assigns routes to specified read functionality, these contains authorisation for roles and routing to views of the controller views

class StopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $stops = Stop::paginate(10);
        return view('admin.stops.index')->with('stops', $stops);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stop $stop)
    {
        return view('admin.stops.show')->with('stop', $stop);
    }
    
    
}
