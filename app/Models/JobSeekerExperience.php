<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobSeekerExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'companies_id',
        'job_seekers_id',
        'designation',
        'address',
        'from_date',
        'to_date',
        'is_present',
        'description',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'companies_id');
    }
}
