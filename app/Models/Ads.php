<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    /** @use HasFactory<\Database\Factories\AdsFactory> */
    use HasFactory;

    public $fillable = [
        'title',
        'description',
        'user_id',
        'status_id',
        'brand_id',
        'address',
        'price',
        'rooms'
    ];
}
