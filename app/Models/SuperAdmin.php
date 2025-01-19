<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class SuperAdmin extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $guard = 'api'; // Specify the guard
}
