<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobs_id',
        'job_seekers_id',
        'resume',
        'description'
    ];
}
