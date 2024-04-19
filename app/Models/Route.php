<?php

namespace App\Models;
//Initialising the model with fillable data for the fields assigned to the model
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
        'private_company_id',
    ];
    //created a one to many relationship between companies and routes
    public function privateCompany()
    {
        return $this->belongsTo(PrivateCompany::class);
    }
    //created a many to many relationship between stops and routes
    public function stops()
    {
        return $this->belongsToMany(Stop::class)->withTimestamps();
    }
}
