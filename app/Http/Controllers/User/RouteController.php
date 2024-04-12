<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        $routes = route::paginate(10);
        return view('user.routes.index')->with('routes', $routes);
    }

    /**
     * Display the specified resource.
     */
    public function show(route $route)
    {
        return view('user.routes.show')->with('route', $route);
    }
    
}
