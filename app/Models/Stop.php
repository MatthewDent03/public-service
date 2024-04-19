<?php

namespace App\Models;
//Initialising the model with fillable data for the fields assigned to the model
use App\Models\Stop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_name',
        'number',
        'estimated_arrival_time',
    ];
    //created a many to many relationship between stops and routes
    public function routes()
    {
        return $this->belongsToMany(Route::class)->withTimestamps();
    }

}
