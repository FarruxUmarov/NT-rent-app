<?php

namespace App\Models;

use Database\Factories\AdsImageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsImage extends Model
{
    /** @use HasFactory<AdsImageFactory> */
    use HasFactory;

    public $fillable = [
        'ads_id',
        'name',

    ];
}
