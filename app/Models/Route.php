<?php

namespace App\Models;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_location',
        'end_location',
        'estimated_departure',
        'estimated_arrival',
        'journey_route',
    ];

    

}
