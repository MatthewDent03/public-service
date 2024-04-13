<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use App\Models\Stop;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * Display the specified resource.
     */
    public function show(Stop $stop)
    {
        return view('dev.stops.show')->with('stop', $stop);
    }
    
    
}
