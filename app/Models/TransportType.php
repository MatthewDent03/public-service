<?php

namespace App\Models;
//Initialising the model with fillable data for the fields assigned to the model
use App\Models\TransportType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];
}
