<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_categories_id',
        'companies_id',
        'slug',
        'title',
        'description',
        'location',
        'salary_range',
        'vacancy',
        'job_nature',
        'dead_line',
    ];

    const TYPES = [
        1 => 'Full Time',
        2 => 'Part Time',
        3 => 'Remote',
        4 => 'Hybrid',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($job) {
            $job->slug = $job->createSlug($job->title);
            $job->save();
        });
    }

    private function createSlug($title): array|string|null
    {
        $slug = Str::slug($title);
        $existingSlug = static::where('slug', $slug)->get();
        if ($existingSlug) {
            $slug = $slug . '-' . $existingSlug->count() . uniqid();
        }

        return $slug;
    }

    public function jobCategory(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class, 'job_categories_id');
    }

    public function applies(): HasMany
    {
        return $this->hasMany(Apply::class, 'jobs_id');
    }

    public function skills(): HasMany
    {
        return $this->hasMany(JobSkill::class, 'job_id');
    }

    public function jobSeekerApply(): HasOne
    {
        return $this->hasOne(Apply::class, 'jobs_id')
            ->where('job_seekers_id', jobSeekerAuthUser()->id ?? '');
    }
}
