<?php

namespace App\Models;

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

    public function routes()
    {
        return $this->belongsToMany(Route::class)->withTimestamps();
    }

}
