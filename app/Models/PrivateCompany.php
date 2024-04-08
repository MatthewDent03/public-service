<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_number',
    ];
}
