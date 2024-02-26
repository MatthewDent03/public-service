<?php

namespace App\Models;

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
