<?php

namespace App\Models;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'start_location',
        'end_location',
        'estimated_departure',
        'estimated_arrival',
        'journey_route',
        'csv_file', // New field for CSV file
    ];
}
