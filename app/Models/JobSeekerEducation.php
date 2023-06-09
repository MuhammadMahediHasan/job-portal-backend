<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_seekers_id',
        'institute',
        'degree',
        'from_date',
        'to_date',
    ];
}
