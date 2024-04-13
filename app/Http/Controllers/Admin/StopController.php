<?php

namespace App\Http\Controllers\Admin;

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
        $user->authorizeRoles('admin');

        $stops = route::paginate(10);
        return view('admin.stops.index')->with('stops', $stops);
    }

    /**
     * Display the specified resource.
     */
    public function show(stop $stop)
    {
        return view('admin.stops.show')->with('stop', $stop);
    }
    
}
