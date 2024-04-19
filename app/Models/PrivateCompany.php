<?php

namespace App\Models;
//Initialising the model with fillable data for the fields assigned to the model
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
    //created a one to many relationship through routes model
    public function routes()
    {
        return $this->hasMany(Route::class);
    }
}
