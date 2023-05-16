<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_categories_id',
        'companies_id',
        'title',
        'description',
        'location',
        'salary_range',
        'vacancy',
        'job_nature',
        'dead_line',
    ];
}
