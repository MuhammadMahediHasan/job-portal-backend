<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'skill_id',
    ];
}
