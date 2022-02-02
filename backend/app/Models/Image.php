<?php

namespace App\Models;

class Image extends Model
{
    protected $fillable = [
        'name',
        'description',
        'favorited'
    ];

    protected $table = 'images';
}