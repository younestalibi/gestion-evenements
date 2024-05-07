<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'places',
        'description',
        'image',
    ];

    protected $casts = [
        'places' => 'array',
    ];
}
