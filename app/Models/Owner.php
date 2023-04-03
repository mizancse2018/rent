<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Owner extends Authenticatable
{
    use HasFactory;
    protected $guard = "owner";
    protected $fillable = [
        'image',
        'name',
        'phone',
        'email',
        'profile_status',
        'address',
        'about',
        'nid_front',
        'nid_back',
        'password',
        'sign',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
