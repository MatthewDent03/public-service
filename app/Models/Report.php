<?php

namespace App\Models;
//Initialising the model with fillable data for the fields assigned to the model
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'nearest_stop',
        'city',
        'incident_date',
    ];
}
