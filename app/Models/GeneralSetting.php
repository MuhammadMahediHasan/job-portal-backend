<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'location',
        'twitter_link',
        'facebook_link',
        'youtube_link',
        'linkedin_link',
        'about_us',
        'help',
        'fqas',
        'our_services',
        'privacy_policy',
        'terms_and_condition',
    ];
}
