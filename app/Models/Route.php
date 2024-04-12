<?php

namespace App\Models;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\privateCompany;

class Route extends Model
{
    use hasFactory;

    protected $fillable = [
        'start_location',
        'end_location',
        'estimated_departure',
        'estimated_arrival',
        'journey_route',
    ];

    public function privateCompany()
    {
        return $this->belongsTo(PrivateCompany::class);
    }
}
