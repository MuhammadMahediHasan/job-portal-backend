<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
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
}
