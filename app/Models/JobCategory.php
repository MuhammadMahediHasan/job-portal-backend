<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class JobCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($category) {
            $category->slug = $category->createSlug($category->name);
            $category->save();
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

    public function job(): HasMany
    {
        return $this->hasMany(Job::class, 'job_categories_id');
    }
}
