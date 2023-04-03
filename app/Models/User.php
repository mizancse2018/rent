<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'image',
        'name',
        'father_name',
        'phone',
        'nid',
        'dob',
        'marital_status',
        'religion',
        'education',
        'occupation',
        'institution',
        'email',
        'profile_status',
        'address',
        'about',
        'ec_name',
        'ec_relationship',
        'ec_phone',
        'ec_address',
        'fm_name',
        'fm_age',
        'fm_occupation',
        'fm_phone',
        'hw_name',
        'hw_nid',
        'hw_phone',
        'hw_address',
        'd_name',
        'd_nid',
        'd_phone',
        'd_address',
        'pho_name',
        'pho_phone',
        'pho_address',
        'password',
        'nid_front',
        'nid_back',
        'sign',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function rent(){
        return $this->hasMany(Rent::class);
    }
}
