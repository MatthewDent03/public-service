<?php

namespace App\Http\Controllers\User;

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
        $user->authorizeRoles('user');

        $stops = Stop::paginate(10);
        return view('user.stops.index')->with('stops', $stops);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stop $stop)
    {
        return view('user.stops.show')->with('stop', $stop);
    }
    
    
}
