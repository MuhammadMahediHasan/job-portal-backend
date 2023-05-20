<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function jobCategory(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function applies(): HasMany
    {
        return $this->hasMany(Apply::class);
    }
}
