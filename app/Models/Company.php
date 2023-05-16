<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

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
