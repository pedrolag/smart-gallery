<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name',
        'description',
        'favorited',
        'url'
    ];

    protected $table = 'images';
}