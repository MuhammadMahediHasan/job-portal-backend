<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'email',
        'first_name',
        'last_name',
        'profile',
        'birth_date',
        'phone',
        'address',
        'portfolio',
        'resume',
        'password',
    ];
}
