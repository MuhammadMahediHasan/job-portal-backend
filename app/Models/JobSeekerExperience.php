<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'companies_id',
        'job_seekers_id',
        'designation',
        'from_date',
        'to_date',
        'is_present',
        'description',
    ];
}
