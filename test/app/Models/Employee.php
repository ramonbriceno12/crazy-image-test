<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Fillable fields for mass assignment
    protected $fillable = [
        'name',
        'age',
        'salary',
        'profile_picture',
    ];
}
