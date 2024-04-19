<?php

namespace App\Models;
//Initialising the model with fillable data for the fields assigned to the model
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    //created a many to many relationship between user and roles
    public function users(){
        return $this->belongsToMany('User', 'user_role');
    }
}
