<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Company extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'type',
        'name',
        'email',
        'address',
        'phone',
        'description',
        'trade_license_no',
        'tin_no',
        'website',
        'facebook',
        'linked_in',
        'youtube',
        'contact_person',
        'contact_person_phone',
        'contact_person_designation',
        'password',
    ];

    const TYPES = [
        1 => 'Government',
        2 => 'Semi Government',
        3 => 'NGO',
        4 => 'Private Firm/Company',
        6 => 'International Agencies',
        7 => 'Others',
    ];
}
