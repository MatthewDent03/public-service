<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrivateCompany;
use App\Models\Route;

class PrivateCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_number',
    ];

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
}
