<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class JobSeeker extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

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

    protected $appends = [
        'name'
    ];

    public function getNameAttribute(): string
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function currentCompany(): HasOne
    {
        return $this->hasOne(JobSeekerExperience::class, 'job_seekers_id')
            ->where(function ($query) {
                $query->whereNull('to_date')
                    ->orWhere(function ($query) {
                        $query->latest();
                    });
            });
    }
}
