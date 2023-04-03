<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'owner_id',
        'property_title',
        'property_type',
        'division',
        'district',
        'area',
        'thana',
        'post_code',
        'road',
        'price',
        'holding',
        'floor',
        'bed',
        'bath',
        'balcony',
        'description',
    ];

    public function image(){
        return $this->hasMany(Image::class);
    }
    public function rent(){
        return $this->hasMany(Rent::class);
    }
}
